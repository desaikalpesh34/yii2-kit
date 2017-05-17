<?php

namespace app\controllers\user;

use frontend\components\mailer\Mailer;
use frontend\models\RecoveryForm;
use frontend\models\Token;
use dektrium\user\controllers\RecoveryController as BaseRecoveryController;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * {@inheritDoc}
 */
class RecoveryController extends BaseRecoveryController
{
    public $layout = 'user';

    const REQUEST_SUCCESS_FLASH = 'recoveryRequestSuccess';


    /**
     * {@inheritDoc}
     */
    public function beforeAction($action)
    {
        if ($action->id == 'reset') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }


    /**
     * {@inheritDoc}
     */
    public function actionRequest()
    {
        if ( ! $this->module->enablePasswordRecovery) {
            throw new NotFoundHttpException();
        }

        /** @var RecoveryForm $model */
        $model = \Yii::createObject([
            'class'    => RecoveryForm::className(),
            'scenario' => RecoveryForm::SCENARIO_REQUEST,
        ]);
        $event = $this->getFormEvent($model);

        $this->performAjaxValidation($model);
        $this->trigger(self::EVENT_BEFORE_REQUEST, $event);

        Yii::$container->set('dektrium\user\Mailer', new Mailer());

        if ($model->load(\Yii::$app->request->post()) && $model->sendRecoveryMessage()) {
            $this->trigger(self::EVENT_AFTER_REQUEST, $event);

            return $this->render('request', [
                'model' => $model,
            ]);
        }

        return $this->render('request', [
            'model' => $model,
        ]);
    }


    /**
     * {@inheritDoc}
     */
    public function actionReset($id, $code = '')
    {
        if ( ! $this->module->enablePasswordRecovery) {
            throw new NotFoundHttpException();
        }

        if ($code == '') {
            return $this->render('validation-code');
        }

        /** @var Token $token */
        $token = $this->finder->findToken(['user_id' => $id, 'code' => $code, 'type' => Token::TYPE_RECOVERY])->one();
        $event = $this->getResetPasswordEvent($token);

        $this->trigger(self::EVENT_BEFORE_TOKEN_VALIDATE, $event);

        if ($token === null || $token->isExpired || $token->user === null) {
            $this->trigger(self::EVENT_AFTER_TOKEN_VALIDATE, $event);
            Yii::$app->session->setFlash('danger',
                Yii::t('user', 'Recovery link is invalid or expired. Please try requesting a new one.'));

            return $this->render('/message', [
                'title'  => Yii::t('user', 'Invalid or expired link'),
                'module' => $this->module,
            ]);
        }

        /** @var RecoveryForm $model */
        $model = Yii::createObject([
            'class'    => RecoveryForm::className(),
            'scenario' => RecoveryForm::SCENARIO_RESET,
        ]);
        $event->setForm($model);

        $this->performAjaxValidation($model);
        $this->trigger(self::EVENT_BEFORE_RESET, $event);

        if ($model->load(Yii::$app->getRequest()->post()) && $model->resetPassword($token)) {
            $this->trigger(self::EVENT_AFTER_RESET, $event);

            return $this->goHome();
        }

        $userEmail = $this->finder->findUserById($id)->email;

        return $this->render('reset', [
            'model'     => $model,
            'userEmail' => $userEmail,
        ]);
    }
}