<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "paypal_transactions".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string  $user_register_email
 * @property string  $payment_id
 * @property string  $hash
 * @property integer $complete
 *
 * @property User    $user
 */
class PaypalTransaction extends \yii\db\ActiveRecord
{
    const PAYMENT_COMPLETE = 1;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paypal_transactions';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_id', 'hash'], 'required'],
            [['user_id', 'complete'], 'integer'],
            [['payment_id', 'hash', 'user_register_email'], 'string', 'max' => 256],
            [['payment_id'], 'unique'],
            [['hash'], 'unique'],
            [
                ['user_id'],
                'exist',
                'skipOnError'     => true,
                'targetClass'     => User::className(),
                'targetAttribute' => ['user_id' => 'id'],
            ],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => Yii::t('app', 'ID'),
            'user_id'    => Yii::t('app', 'User ID'),
            'payment_id' => Yii::t('app', 'Payment ID'),
            'hash'       => Yii::t('app', 'Hash'),
            'complete'   => Yii::t('app', 'Complete'),
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }


    /**
     * Takes payment hash and returns its payment id
     *
     * @param string $hash
     *
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public static function getPaymentIdByHash($hash)
    {
        if (empty($hash)) {
            return null;
        }
        return PaypalTransaction::findOne(['hash' => $hash])->payment_id;
    }


    /**
     * Takes payment id and returns the PaypalTransaction model
     *
     * @param $paymentId
     *
     * @return PaypalTransaction
     * @throws \yii\base\InvalidConfigException
     */
    public static function getTransactionByPaymentId($paymentId)
    {
        return PaypalTransaction::findOne(['payment_id' => $paymentId]);
    }


    /**
     * Set payment complete
     */
    public function setPaymentComplete()
    {
        $this->complete = self::PAYMENT_COMPLETE;
    }

}
