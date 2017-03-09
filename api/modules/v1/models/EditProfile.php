<?php
namespace api\modules\v1\models;

use common\models\User;
use yii\base\Model;
use Yii;

class EditProfile extends Model
{
    public $name;
    public $pic;

    public function rules()
    {
        return [
            ['name','required'],
            ['name','string','min' => 3],
            ['pic','file','extensions'=>'jpg,png,gif,jpeg']
        ];
    }

    public function attributeLabels()
    {
        return [
            'pic'=>Yii::t('frontend', 'Pic'),
            'name'=>Yii::t('frontend', 'Name'),
        ];
    }
}
