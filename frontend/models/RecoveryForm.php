<?php
namespace frontend\models;

use frontend\components\mailer\Mailer;
use dektrium\user\Finder;
use dektrium\user\models\RecoveryForm as BaseRecoveryForm;
use himiklab\yii2\recaptcha\ReCaptchaValidator;
use Yii;

/**
 * {@inheritDoc}
 */
class RecoveryForm extends BaseRecoveryForm
{
    /**
     * @var string
     */
    public $reCaptcha;

    /**
     * @var string
     */
    public $passwordConfirm;


    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        $rules   = parent::rules();
        $rules[] = ['reCaptcha', 'required'];
        $rules[] = [
            ['reCaptcha'],
            ReCaptchaValidator::className(),
            'secret' => '6Ld6DAoUAAAAAJbrWkNSIL3smKRDC4Vg2r63W2QB'
        ];
        $rules[] = ['passwordConfirm', 'required'];
        $rules[] = [
            'passwordConfirm',
            'compare',
            'compareAttribute' => 'password',
            'message'          => "Passwords don't match"
        ];

        return $rules;
    }


    /**
     * @inheritdoc
     */
    public function __construct(Mailer $mailer, Finder $finder, $config = [])
    {
        $this->mailer = new Mailer();
        $this->finder = $finder;
        parent::__construct($this->mailer, $this->finder, $config);
    }


    /**
     * {@inheritDoc}
     */
    public function scenarios()
    {
        $scenarios                         = parent::scenarios();
        $scenarios[self::SCENARIO_REQUEST] = ['email', 'reCaptcha'];
        $scenarios[self::SCENARIO_RESET]   = ['password', 'passwordConfirm'];

        return $scenarios;
    }


    /**
     * Sends recovery message.
     *
     * @return bool
     */
    public function sendRecoveryMessage()
    {
        if ( ! $this->validate()) {
            return false;
        }

        $user = $this->finder->findUserByEmail($this->email);

        if ($user instanceof User) {
            /** @var Token $token */
            $token = \Yii::createObject([
                'class'   => Token::className(),
                'user_id' => $user->id,
                'type'    => Token::TYPE_RECOVERY,
            ]);

            if ( ! $token->save(false)) {
                return false;
            }

            Yii::$container->set('dektrium\user\Mailer', new Mailer());

            if ( ! $this->mailer->sendRecoveryMessage($user, $token)) {
                return false;
            }
        }

        \Yii::$app->session->setFlash('info',
            \Yii::t('user', 'An email has been sent with instructions for resetting your password'));

        return true;
    }
}