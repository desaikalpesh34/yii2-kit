<?php

namespace frontend\models;

use yii\base\Model;

/**
 * ContactUsForm is the model behind the contact us form at the homepage.
 */
class ContactUsForm extends Model
{

    /**
     * @var string $firstName
     * @var string $lastName
     * @var string $email
     * @var string $phone
     * @var string $message
     */
    public $firstName, $lastName, $email, $phone, $message;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // first name, last name, email and message are required
            [['firstName', 'lastName', 'email', 'message'], 'required', 'message' => 'This field cannot be blank'],
            // email has to be a valid email address
            ['email', 'email'],
            //telephone should be a real one
            ['phone', 'integer', 'message' => 'You phone should be a real one'],
            //[
            //    'phone',
            //    'udokmeci\yii2PhoneValidator\PhoneValidator',
            //    'format' => true
            //]

        ];
    }


    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'firstName' => 'Enter Your Name*',
            'lastName'  => '',
            'email'     => 'Enter Your Email Address*',
            'phone'     => 'Enter Your Phone Number',
            'message'   => 'Message*',

        ];
    }


    public function contact($email, $form)
    {
        if ($this->validate()) {
            //return Yii::$app->mailer->compose()
            //    ->setTo($email)
            //    ->setFrom([$this->email => $this->email])
            //    ->setTextBody($this->message)
            //    ->send();

            return \Yii::$app->mailer->compose('contact-us', ['form' => $form])
                                     ->setFrom([\Yii::$app->params['adminEmail'] => 'Test Mail'])->setTo($email)
                                     ->setSubject('This is a test mail')->send();
        }

        return false;
    }

}
