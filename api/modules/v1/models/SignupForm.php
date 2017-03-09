<?php
namespace api\modules\v1\models;

use common\models\User;
use yii\base\Model;
use Yii;

class SignupForm extends Model
{
    public $name;
    public $email;
    public $password;

    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique',
                'targetClass'=> '\common\models\User',
                'message' => Yii::t('frontend', 'This email address has already been taken.')
            ],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['name','required'],
            ['name','string','min' => 3],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email'=>Yii::t('frontend', 'E-mail'),
            'password'=>Yii::t('frontend', 'Password'),
            'name'=>Yii::t('frontend', 'Name'),
        ];
    }
}
