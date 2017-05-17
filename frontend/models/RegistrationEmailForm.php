<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * {@inheritDoc}
 */
class RegistrationEmailForm extends Model
{
    public $registrationEmail;


    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        return [
            // email rules
            'emailTrim'     => ['registrationEmail', 'filter', 'filter' => 'trim'],
            'emailRequired' => ['registrationEmail', 'required', 'message' => 'This field cannot be blank.'],
            'emailPattern'  => ['registrationEmail', 'email'],
            'emailUnique'   => [
                'registrationEmail',
                'unique',
                'targetClass'     => User::className(),
                'targetAttribute' => 'email',
                'message'         => Yii::t('user', 'This email address has already been taken'),
            ],
        ];
    }

}