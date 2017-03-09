<?php

namespace api\modules\v1\controllers;

use common\models\User;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use api\modules\v1\models\search\UserSearch;
use Yii;
use api\modules\v1\models\Login;
use api\modules\v1\models\SignupForm;
use common\models\UserProfile;
use api\modules\v1\models\ChangePassWord;
use api\modules\v1\models\PasswordResetRequestForm;
use api\modules\v1\models\EditProfile;
class UserController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'only' => ['change-password','profile','logout','edit-profile','index'],
            'authMethods' => [
                [
                    'class' => HttpBasicAuth::className(),
                    'auth' => function($username, $password){
                        $user = User::findByLogin($username);
                        if(!$user){ return null;}
                        return $user->validatePassword($password)?$user: null;
                                    },
                ],
                HttpBearerAuth::className(),
                QueryParamAuth::className()
            ]
        ];
        return $behaviors;
    }

    public function actionLogin()
    {
        $model = new Login();
        $model->load(Yii::$app->request->bodyParams,'');
        if($model->validate()){
            return $model->user;
        }else{
            return $model;
        }
    }

    public function actionRegister()
    {
        $model = new SignupForm();
        $model->load(Yii::$app->request->bodyParams,'');
        if($model->validate()){
            $user = new User;
            $user->username = $model->email;
            $user->email = $model->email;
            $user->setPassword($model->password);
            $user->status = User::STATUS_ACTIVE;
            $user->save(false);
            $profile = new UserProfile();
            $profile->user_id = $user->id;
            $profile->firstname = $model->name;
            $profile->save(false); 
            $auth = Yii::$app->authManager;
            $auth->assign($auth->getRole('user'), $user->id);

             //add history
             $his_data = ['model'=>User::className(),'id'=>$user->id,'old'=>$user->getOldAttributes(),'new'=>$user->getAttributes()];

            Yii::$app->commandBus->handle(new \common\commands\UserHistoryCommand([
                'user_id' => $user->id,
                'title' => 'Registration',
                'description' => 'Registration in the system',
                'level' => 0,
                'class' => User::className(),
                'status' => 1,
                'data' => $his_data,
            ]));

            //add notification
            Yii::$app->commandBus->handle(new \common\commands\UserNotificationCommand([
                'user_id' => $user->id,
                'title' => 'Registration',
                'description' => 'Registration in the system',
                'is_read'=>0,
                'status' => 1,
            ]));
            return $user;
        }else{
            return $model;
        }
    }

    public function actionSocialLogin()
    {
    }

    public function actionChangePassword()
    {
        $model = new ChangePassWord();
        $model->load(Yii::$app->request->bodyParams,'');
        if($model->validate()){
         $user = User::findOne(Yii::$app->user->id);
         $user->setPassword($model->new_password);
         $user->save(false);
         return $user;
        }else
        {
            return $model;
        }
    }

    public function actionForgotPassword()
    {
        $model = new PasswordResetRequestForm();
        $model->load(Yii::$app->request->bodyParams,'');
        if($model->validate())
        {
           $model->sendEmail();
           return $model->user;
        }else
        {
            return $model;
        }
    }

    public function actionPasswordActivate()
    {
    }

    public function actionPasswordRecover()
    {
    }

    public function actionProfile()
    {
        return User::findOne(Yii::$app->user->id);
    }

    public function actionEditProfile()
    {
      $model = new EditProfile();
      $model->load(Yii::$app->request->bodyParams,'');
        if($model->validate()){
            $file_name = Yii::$app->getSecurity()->generateRandomString();
            $file_path = Yii::getAlias('@storage/web/source/');
            $image_val = \yii\web\UploadedFile::getInstance($model, "pic");
            if ($image_val) {
                $fullpath = $file_path.$file_name.'.'.$image_val->extension;
                $image_val->saveAs($fullpath);
                $model->pic = $file_name.'.'.$image_val->extension;
            }
            $profile = UserProfile::find()->where(['user_id'=>Yii::$app->user->id])->one();
            $profile->firstname = $model->name;
            if($model->pic):
             $profile->avatar_path =$model->pic;
            endif;
            $profile->save(false);
            return $profile;
        }else
        {
            return $model;
        }
    }
    
    public function actionLogout() 
    {
    }

    public function actionIndex()
    {
        $searchModel = new UserSearch();
        return $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    }

    public function findModel($id)
    {
        $model = User::findOne($id);
        if (!$model) 
        {
            throw new NotFoundHttpException;
        }
        return $model;
    }
}
