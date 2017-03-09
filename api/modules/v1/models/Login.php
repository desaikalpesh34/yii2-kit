<?php

namespace api\modules\v1\models;

use common\models\User as Master;
use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\web\ForbiddenHttpException;

/**
 * Login form
 */
class Login extends Model
{

    public $email;
    public $password;
    private $user = false;

    public function rules()
    {
        return [
            // email and password are both required
            [['email','password'], 'filter', 'filter'=>'strtolower'],
            [['email', 'password'], 'required'],
            //['email', 'email'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email'    => Yii::t('backend', 'Email'),
            'password' => Yii::t('backend', 'Password'),
                //'rememberMe' => Yii::t('backend', 'Remember Me')
        ];
    }

    public function validatePassword()
    {
            $userobj = $this->getUser();
            if (!$userobj || !$userobj->validatePassword($this->password))
            {
                $this->addError('password', Yii::t('backend', 'Incorrect username or password.'));
                return false;
            }else
            {
                return true;
            }
    }

    public function getUser()
    {
        if ($this->user === false)
        {
            $this->user =  Master::find()->where(['email'=>$this->email])->orWhere(['username'=>$this->email])->andWhere(['!=','status',3])->one();
        }
        return $this->user;
    }
}
