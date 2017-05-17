<?php

namespace common\components\mailer;

use frontend\models\Token;
use Yii;

/**
 * {@inheritDoc}
 */
class Mailer extends \dektrium\user\Mailer
{
    const REGISTRATION_EMAIL = 'registrationEmail';
    const RE_REGISTER_EMAIL = 're_register_email';


    /**
     * {@inheritDoc}
     */
    public function sendWelcomeMessage(
        \dektrium\user\models\User $user,
        \dektrium\user\models\Token $token = null,
        $showPassword = false
    ) {
        $message = $this->sendMessage($user->email, $this->getWelcomeSubject(), 'welcome', [
            'user'         => $user,
            'token'        => $token,
            'module'       => $this->module,
            'showPassword' => $showPassword,
            'typeOfEmail'  => self::REGISTRATION_EMAIL,
        ]);

    }


    /**
     * {@inheritDoc}
     */
    public function sendRecoveryMessage(\dektrium\user\models\User $user, \dektrium\user\models\Token $token)
    {
        return $this->sendMessage($user->email, $this->getRecoverySubject(), 'recovery',
            ['user' => $user, 'token' => $token, 'typeOfEmail' => self::RE_REGISTER_EMAIL]);
    }


    /**
     * {@inheritDoc}
     */
    protected function sendMessage($to, $subject, $view, $params = [])
    {
        /** @var \yii\mail\BaseMailer $mailer */
        $mailer                   = Yii::$app->mailer;
        $mailer->viewPath         = $this->viewPath;
        $mailer->getView()->theme = Yii::$app->view->theme;

        if ($this->sender === null) {
            $this->sender = isset(Yii::$app->params['adminEmail']) ? Yii::$app->params['adminEmail'] : 'no-reply@example.com';
        }

        $mail = $mailer->compose(['html' => $view, 'text' => 'text/' . $view], $params)->setTo($to)
                       ->setFrom($this->sender)->setSubject($subject);

        //saves registration email to the db
        if ($params['typeOfEmail'] === self::REGISTRATION_EMAIL) {
            $params['user']->registration_email = $mail->toString();
            $params['user']->save();
        } elseif ($params['typeOfEmail'] === self::RE_REGISTER_EMAIL) {
            $params['user']->re_register_email = $mail->toString();
            $params['user']->save();
        }

        return $mail->send();
    }
}