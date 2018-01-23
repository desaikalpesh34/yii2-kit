<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "time_zone".
 *
 * @property integer $id
 * @property string $country_code
 * @property string $zone_name
 */
class TimeZone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'time_zone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_code', 'zone_name'], 'required'],
            [['country_code'], 'string', 'max' => 2],
            [['zone_name'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_code' => 'Country Code',
            'zone_name' => 'Zone Name',
        ];
    }
}
