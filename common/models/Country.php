<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $name
 * @property integer $region_id
 * @property string $status
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $country_code
 * @property integer $default_time_zone_id
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'region_id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by', 'country_code'], 'required'],
            [['region_id', 'created_by', 'updated_by', 'default_time_zone_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['status'], 'string', 'max' => 1],
            [['country_code'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'region_id' => 'Region ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'country_code' => 'Country Code',
            'default_time_zone_id' => 'Default Time Zone ID',
        ];
    }
}
