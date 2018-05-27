<?php 
namespace common\components\mine;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\User;
use yii\base\Component;

class ApiManager extends Component
{
   public $status=false;
   public $message;
   public $exept;
   public $data;
   public $identity =null;

   public function auth()
   {
       $this->AppPropery();
       if(!in_array(Yii::$app->controller->id.'/'.Yii::$app->controller->action->id,$this->exept))
       {
           if(Yii::$app->request->headers->has('my_kit_auth'))
           {
              $model = User::findIdentityByAccessToken(Yii::$app->request->headers->get('my_kit_auth'));
              if($model)
              {
                $this->status=true;
                $this->message= Yii::t('api','Authentication success.');
                $this->data[] =['id'=>$model->id,'token'=>$model->access_token];
                $this->identity = $model;
              }else
              {
                $this->status=false;
                $this->message= Yii::t('api','Authentication failed.');
                $this->data =(object)[];
              }
           }else
           {
              $this->status=false;
              $this->message=Yii::t('api','Authentication token missing or mis configured.');
              $this->data =(object)[];
           }
       }else
       {
          $this->status=true;
          $this->message=Yii::t('api','Authentication not require.');
          $this->data =(object)[];
       }
   }

   private function AppPropery()
   {
      //setting api language
      if(Yii::$app->request->headers->has('accept-language'))
      {
         Yii::$app->language  =  Yii::$app->request->headers->get('accept-language');
      }
   }
}
?>