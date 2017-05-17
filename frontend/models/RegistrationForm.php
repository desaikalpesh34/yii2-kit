<?php
namespace frontend\models;

use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use Yii;

/**
 * {@inheritDoc}
 */
class RegistrationForm extends BaseRegistrationForm
{
    public $paymentPlan;

    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        $rules = parent::rules();
        unset($rules['usernameRequired']);
        array_push($rules, ['paymentPlan', 'in', 'range' => [User::FAMILY_PLAN, User::SINGLE_PLAN]]);
        array_push($rules, [['paymentPlan'], 'required']);

        return $rules;
    }


    public function register()
    {
        if ( ! $this->validate()) {
            return false;
        }

        /** @var User $user */
        $user = Yii::createObject(\frontendmodels\User::className());
        $user->setScenario('register');
        $this->loadAttributes($user);

        if ( ! $user->register()) {
            return false;
        }

        Yii::$app->session->setFlash('info', Yii::t('user',
            'Your account has been created and a message with further instructions has been sent to your email'));

        return true;
    }
}