<?php
namespace api\modules\v1\models;

use cheatsheet\Time;
use common\commands\SendEmailCommand;
use common\models\UserToken;
use Yii;
use common\models\User;
use yii\base\Model;

class PasswordResetRequestForm extends Model
{
    public $email;
    public $user;

    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\common\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such email.'
            ],
        ];
    }

    public function sendEmail()
    {
        $this->user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if ($this->user) {
            $token = UserToken::create($this->user->id, UserToken::TYPE_PASSWORD_RESET, Time::SECONDS_IN_A_DAY);
            if ($this->user->save()) 
            {
                return Yii::$app->commandBus->handle(new SendEmailCommand([
                    'to' => $this->email,
                    'subject' => Yii::t('frontend', 'Password reset for {name}', ['name'=>Yii::$app->name]),
                    'view' => 'passwordResetToken',
                    'params' => [
                        'user' => $this->user,
                        'token' => $token->token
                    ]
                ]));
            }
        }
        return false;
    }

    public function attributeLabels()
    {
        return [
            'email'=>Yii::t('frontend', 'E-mail')
        ];
    }
}
