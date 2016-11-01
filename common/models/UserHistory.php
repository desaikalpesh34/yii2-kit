<?php

namespace common\models;

use Yii;
use \yii\db\ActiveRecord;

class UserHistory extends ActiveRecord
{
   
    public static function tableName()
    {
        return '{{%user_history}}';
    }

    public function rules()
    {
        return [
            [['user_id', 'title','description','level','status'], 'required'],
            [['user_id', 'level', 'status', 'created_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['title'], 'string', 'max' => 120],
            [['class'], 'string', 'max' => 60],
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
            'level' => Yii::t('common', 'Level'),
            'class' => Yii::t('common', 'Class'),
            'status' => Yii::t('common', 'Status'),
            'data' => Yii::t('common', 'Data'),
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
