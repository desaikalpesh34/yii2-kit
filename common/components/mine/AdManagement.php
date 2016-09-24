<?php 
namespace common\components\mine;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\AdManager;

class AdManagement extends \yii\base\Component
{
    public function Tripads()
    {
         $model=AdManager::find()->where(['type'=>'trip'])->select(['image','link'])->asArray()->all();
         return $this->AdProvider($model);
    }

    public function Vehicleads()
    {
         $model=AdManager::find()->where(['type'=>'vehicle'])->select(['image','link'])->asArray()->all();
         return $this->AdProvider($model);
    }

    public function Partsads()
    {
         $model=AdManager::find()->where(['type'=>'parts'])->select(['image','link'])->asArray()->all();
         return $this->AdProvider($model);
    }

    public function FinanceRightads()
    {
          $model=AdManager::find()->where(['type'=>'finance','sub_type'=>2])->select(['image','link'])->asArray()->all();
          return $this->AdProvider($model);
    }

    public function FinanceLeftads()
    {
         $model=AdManager::find()->where(['type'=>'finance','sub_type'=>1])->select(['image','link'])->asArray()->all();
         return $this->AdProvider($model);
    }

    public function InsuranceRightads()
    {
        $model=AdManager::find()->where(['type'=>'insurance','sub_type'=>2])->select(['image','link'])->asArray()->all();
        return $this->AdProvider($model);
    }

    public function InsuranceLeftads()
    {
         $model=AdManager::find()->where(['type'=>'insurance','sub_type'=>1])->select(['image','link'])->asArray()->all();
         return $this->AdProvider($model);
    }

    public function Randomads()
    {
         $model=AdManager::find()->select(['image','link'])->asArray()->all();
         return $this->AdProvider($model);
    }

    private function AdProvider($model)
    {
       if(!empty($model))
         {
             $rand_image = array_rand($model,1);
             return '<a href="'.$model[$rand_image]["link"].'" target="_blank"><img src="'.Yii::getAlias('@storageUrl/ad/').$model[$rand_image]["image"].'" class="img-responsive"></a>';
         }
         return '';
    }
}

    ?>