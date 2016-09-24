<?php 
namespace common\components\mine;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\User;
use yii\base\Component;


class ApiGeneralData extends Component
{
   public function GetData($class,$name,$id='id')
   {
      $obj=Yii::createObject([
          'class' => 'common\models\\'.$class,
      ]);
      $model = $obj::find()->select([$name,$id])->asArray()->all();
      $cargolist=[];
      $cargolist1;
      foreach ($model as $key => $value) 
      {
            $cargolist[]= ['id'=>$value[$id],'value'=>$value[$name]];
      }
      return $cargolist;
   }

}
?>