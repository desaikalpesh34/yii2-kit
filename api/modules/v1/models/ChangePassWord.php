<?php
    namespace api\modules\v1\models;
   
    use Yii;
    use yii\base\Model;
    use common\models\User;
   
    class ChangePassWord extends Model
    {
        public $old_password;
        public $new_password;
        public $user_id;
        
        public function rules(){
            return [
                [['old_password','new_password'], 'filter', 'filter'=>'strtolower'],
                [['old_password','new_password'],'required'],
                //[['user_id'],'integer'],
                ['old_password','findPasswords'],
                //['repeatnewpass','compare','compareAttribute'=>'newpass'],
            ];
        }
       
        public function findPasswords($attribute, $params)
        {
            $user = User::findOne(Yii::$app->user->id);
            //$password = $user->password_hash;
            if(!$user->validatePassword($this->old_password))
            {
                $this->addError($attribute,'Old password is incorrect');
                return false;
            }else
            {
                return true;
            }
        }
       
        public function attributeLabels(){
            return [
                'old_password'=>'Old Password',
                'new_password'=>'New Password',
                'user_id'=>'User',
                //'repeatnewpass'=>'Repeat New Password',
            ];
        }
    } 