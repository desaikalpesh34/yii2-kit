<?php

namespace common\models;

use Yii;
use \yii\db\ActiveRecord;

class UserNotification extends ActiveRecord
{
    public static function tableName()
    {
      return '{{%user_notification}}';
    }

    public function rules()
    {
        return [
            [['user_id', 'title'], 'required'],
            [['user_id', 'is_read', 'status', 'created_at'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 120],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'user_id' => Yii::t('common', 'User'),
            'title' => Yii::t('common', 'Title'),
            'description' => Yii::t('common', 'Description'),
            'is_read' => Yii::t('common', 'Is Read'),
            'status' => Yii::t('common', 'Status'),
            'created_at' => Yii::t('common', 'Created At'),
        ];
    }

    public function behaviors()
    {
      return [
            'timestamp' => [
             'class' => 'yii\behaviors\TimestampBehavior',
             'attributes' => [
                 ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
             ],
         ],
      ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
