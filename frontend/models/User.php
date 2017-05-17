<?php

namespace frontend\models;

use frontend\components\mailer\Mailer;
use Carbon\Carbon;
use dektrium\user\helpers\Password;
use dektrium\user\models\User as BaseUser;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * {@inheritDoc}
 * @property Profile $profile
 * @property string  registration_email
 */
class User extends BaseUser
{
    const FAMILY_PLAN = 'family';
    const SINGLE_PLAN = 'single';
    const SESSION_REGISTERED_USER_ID = 'registeredUserId';


    /**
     * {@inheritDoc}
     */
    public function init()
    {
        $this->on(self::BEFORE_REGISTER, function () {
            $this->username = $this->email;
        });

        parent::init();
    }


    /**
     * {@inheritDoc}
     */
    public function fields()
    {
        return [
            'paymentPlan' => 'payment_plan',
        ];
    }


    /**
     * {@inheritDoc}
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();

        return ArrayHelper::merge($scenarios, [
            'register' => ['username', 'email', 'password', 'paymentPlan', 'registration_email'],
        ]);
    }


    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        $rules = parent::rules();
        unset($rules['usernameRequired']);

        $rules[] = [['registration_email', 're_register_email', 'congratulations_email'], 'string'];

        return $rules;
    }


    public function getLotteryYear()
    {
        if (isset($this->created_at)) {
            $date = Carbon::createFromTimestamp($this->created_at);

            $thisYear = [1, 2, 3, 4, 5, 6, 7];

            if (in_array($date->month, $thisYear)) {
                return $date->year . '-' . $date->addYear()->year;
            } else {
                return $date->addYear()->year . '-' . $date->addYear()->year;
            }
        } else {
            return null;
        }
    }


    public function register()
    {
        if ($this->getIsNewRecord() == false) {
            throw new \RuntimeException('Calling "' . __CLASS__ . '::' . __METHOD__ . '" on existing user');
        }

        $transaction = $this->getDb()->beginTransaction();

        try {
            $this->confirmed_at = $this->module->enableConfirmation ? null : time();
            $this->password     = $this->module->enableGeneratingPassword ? Password::generate(8) : $this->password;

            $this->trigger(self::BEFORE_REGISTER);

            if ( ! $this->save()) {
                $transaction->rollBack();

                return false;
            }

            if ($this->module->enableConfirmation) {
                /** @var Token $token */
                $token = \Yii::createObject(['class' => Token::className(), 'type' => Token::TYPE_CONFIRMATION]);
                $token->link('user', $this);
            }
            Yii::$container->set('dektrium\user\Mailer', new Mailer());

            $this->mailer->sendWelcomeMessage($this, isset($token) ? $token : null);
            $this->trigger(self::AFTER_REGISTER);

            $transaction->commit();

            Yii::$app->session->set(self::SESSION_REGISTERED_USER_ID, $this->id);
            return true;
        } catch (\Exception $e) {
            $transaction->rollBack();

            return false;
        }
    }
}