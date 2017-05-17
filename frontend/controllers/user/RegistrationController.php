<?php

namespace frontend\controllers\user;

use frontend\models\PaypalRegistrationForm;
use frontend\models\PaypalTransaction;
use frontend\models\RegistrationEmailForm;
use frontend\models\User;
use dektrium\user\controllers\RegistrationController as BaseAdminController;
use dektrium\user\Finder;
use dektrium\user\models\LoginForm;
use dektrium\user\models\RegistrationForm;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use utils\arrays;
use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * {@inheritDoc}
 */
class RegistrationController extends BaseAdminController
{
    const PAYPAL_SUCCSESS_LINK = 'http://www.usaimmigration.local/user/registration/pay-with-paypal?approval=true';

    const PAYPAL_FAILURE_LINK = 'http://www.usaimmigration.local/user/registration/pay-with-paypal?approval=false';

    const SESSION_PAYPAL_HASH = 'paypalHash';

    const SESSION_REGISTRATION_FORM = 'registrationForm';

    public $layout = 'user';

    public $defaultAction = 'plan';

    public $api;


    public function __construct(
        $id,
        \yii\base\Module $module,
        Finder $finder,
        array $config = []
    )
    {
        $paypalClientId = Yii::$app->params['paypalClientId'];
        $paypalClientSecret = Yii::$app->params['paypalSecret'];

        $this->api = new ApiContext(new OAuthTokenCredential($paypalClientId, $paypalClientSecret));
        $this->api->setConfig(Yii::$app->params['paypalApiContextConfig']);

        parent::__construct($id, $module, $finder, $config);
    }


    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'register',
                            'connect',
                            'plan',
                            'payment',
                            'finish',
                            'pay-with-paypal',
                        ],
                        'roles' => ['?'],
                    ],
                    ['allow' => true, 'actions' => ['finish'], 'roles' => ['@']],
                    ['allow' => true, 'actions' => ['confirm', 'resend'], 'roles' => ['?', '@']],
                ],
            ],
        ];
    }


    public function actionPlan()
    {
        echo $this->render('plan');
    }


    public function actionPayment($plan = '')
    {
        if (!$this->module->enableRegistration) {
            throw new NotFoundHttpException();
        }

        /** @var RegistrationEmailForm $emailModel */
        $models[] = $emailModel = Yii::createObject(RegistrationEmailForm::className());

        if (\Yii::$app->request->isAjax) {

            $this->performMultipleAjaxValidation($models);

        } elseif (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            /** @var \app\models\RegistrationForm $registrationForm */
            $registrationForm = Yii::createObject(\frontend\models\RegistrationForm::className());
            $emailModel->load($post);

            $registrationForm->email = $emailModel->registrationEmail;
            $registrationForm->paymentPlan = $plan;

            if (!$registrationForm->validate()) {
                return $this->refresh();
            }

            if (isset($post['paypal'])) {
                /** @var RegistrationForm $model */
                $this->redirectToPaypal($registrationForm);
            }
        }

        return $this->render('payment', [
            'emailModel' => $emailModel,
            'module' => $this->module,
            'paymentPlan' => $plan,
        ]);
    }



    protected function performMultipleAjaxValidation(array $models)
    {
        if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->data = [];
            foreach ($models as $model) {
                if ($model->load(\Yii::$app->request->post())) {
                    \Yii::$app->response->format = Response::FORMAT_JSON;
                    \Yii::$app->response->data += ActiveForm::validate($model);
                }
            }
            \Yii::$app->response->send();
            \Yii::$app->end();
        }
    }


    /**
     * @param \app\models\RegistrationForm $registrationForm
     *
     * @return Response
     * @throws \InvalidArgumentException
     * @throws \yii\base\InvalidParamException
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    private function redirectToPaypal($registrationForm)
    {
        if (!$registrationForm->validate()) {
            return $this->refresh();
        }

        $paymentPlanParams = Yii::$app->params['paymentPlan'][$registrationForm->paymentPlan];
        $paymentPlanPrice = $paymentPlanParams['price'];
        $paymentPlanTitle = $paymentPlanParams['title'];

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item1 = new Item();
        $item1->setName($paymentPlanTitle)->setCurrency('USD')->setQuantity(1)->setPrice($paymentPlanPrice);

        $itemList = new ItemList();
        $itemList->setItems([$item1]);

        $details = new Details();
        $details->setSubtotal($paymentPlanPrice);

        $amount = new Amount();
        $amount->setCurrency('USD')->setTotal($paymentPlanPrice)->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)->setItemList($itemList)->setDescription('Membership');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(self::PAYPAL_SUCCSESS_LINK)->setCancelUrl(self::PAYPAL_FAILURE_LINK);

        $payment = new Payment();
        $payment->setIntent('sale')->setPayer($payer)->setRedirectUrls($redirectUrls)->setTransactions([$transaction]);

        try {
            $payment->create($this->api);

            $hash = Yii::$app->getSecurity()->generatePasswordHash($payment->getId());

            Yii::$app->session->set(self::SESSION_PAYPAL_HASH, $hash);
            Yii::$app->session->set(self::SESSION_REGISTRATION_FORM, $registrationForm);

            $paypalTransaction = new PaypalTransaction();
            $paypalTransaction->payment_id = $payment->getId();
            $paypalTransaction->user_register_email = $registrationForm->email;
            $paypalTransaction->hash = $hash;

            $paypalTransaction->save();
        } catch (PayPalConnectionException $e) {
            \Yii::$app->getSession()->setFlash('error', 'Transaction was cancelled');
            return $this->goHome();
        }

        return $this->redirect($payment->getApprovalLink());
    }


    public function actionPayWithPaypal($approval = false, $paymentId = '', $token = '', $PayerID = '')
    {
        $hash = Yii::$app->session->get(self::SESSION_PAYPAL_HASH);

        if ($paymentId !== PaypalTransaction::getPaymentIdByHash($hash) || !arrays::notEmpty([
                $approval,
                $paymentId,
                $token,
                $PayerID,
            ])
        ) {
            \Yii::$app->getSession()->setFlash('error', 'Sorry, but we haven\'t received the payment approval');

            return $this->redirect('payment');
        }

        $payment = Payment::get($paymentId, $this->api);

        $execution = new PaymentExecution();
        $execution->setPayerId($PayerID);

        $soma = $payment->execute($execution, $this->api);

        $paypalTransaction = PaypalTransaction::getTransactionByPaymentId($paymentId);
        $paypalTransaction->setPaymentComplete();
        $paypalTransaction->save();

        Yii::$app->session->remove(self::SESSION_PAYPAL_HASH);

        /** @var \app\models\RegistrationForm $registrationForm */
        $registrationForm = Yii::$app->session->get(self::SESSION_REGISTRATION_FORM);
        if ($registrationForm->validate() && $registrationForm->register()) {

            $paypalTransaction->user_id = Yii::$app->session->get(User::SESSION_REGISTERED_USER_ID);
            //open password modal
            Yii::$app->session->set('password-modal', true);
            $paypalTransaction->save();

            return $this->redirect('/user/registration/finish');
        }

        return $this->goHome();
    }


    public function actionFinish()
    {
        if (!Yii::$app->user->isGuest) {
            $this->goHome();
        }

        /** @var LoginForm $model */
        $model = Yii::createObject(LoginForm::className());
        $event = $this->getFormEvent($model);

        $this->performAjaxValidation($model);

        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('finish', [
            'model' => $model,
            'module' => $this->module,
        ]);
    }

}