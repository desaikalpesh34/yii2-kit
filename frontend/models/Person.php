<?php

namespace frontend\models;

use Carbon\Carbon;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 *
 * @property int    $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $gender
 * @property string $birthdate
 * @property string $country
 * @property array  spouses
 * @property string city_of_birth
 * @property string country_of_birth
 * @property string avatar_url
 *
 * {@inheritDoc}
 */
class Person extends ActiveRecord
{
    const SPOUSE = 'spouse';
    const CHILD = 'child';

    public $birthdate_month;

    public $birthdate_day;

    public $birthdate_year;

    public $photo;

    const AVATAR_PLACEHOLDER = '/img/sample.png';


    public function setRelation($type)
    {
        $this->type_of_relation = $type;
    }


    /**
     * {@inheritDoc}
     */
    public static function tableName()
    {
        return 'persons';
    }


    public function rules()
    {
        return [
            'userIdType'           => ['id', 'integer'],
            'profileIdType'        => ['profile_id', 'integer'],
            'firstNameLength'      => ['first_name', 'string', 'max' => 255],
            'middleNameLength'     => ['middle_name', 'string', 'max' => 255],
            'lastNameLength'       => ['last_name', 'string', 'max' => 255],
            'genderLength'         => ['gender', 'string', 'max' => 255],
            'birthdateLength'      => ['birthdate', 'string', 'max' => 255],
            'countryOfBirthLength' => ['country_of_birth', 'string', 'max' => 255],
            'cityOfBirthLength'    => ['city_of_birth', 'string', 'max' => 255],
            'typeOfRelationLength' => ['type_of_relation', 'string', 'max' => 255],
            [['birthdate_month', 'birthdate_day', 'birthdate_year'], 'integer'],
            [
                [
                    'first_name',
                    'middle_name',
                    'last_name',
                ],
                'match',
                'pattern' => '/^[a-zA-Z ]+$/',
                'message' => 'Please only use letters.',
            ],
            [
                ['first_name', 'last_name', 'city_of_birth'],
                'required',
                'message' => 'Please fill in this field',
            ],
            [
                ['gender', 'birthdate_month', 'birthdate_day', 'birthdate_year'],
                'required',
                'message' => 'Please select your response.',
            ],
            ['photo', 'file'],
            ['avatar_url', 'string'],
        ];
    }


    /**
     * {@inheritDoc}
     */
    public function beforeValidate()
    {
        if ( ! empty($this->birthdate_year) && ! empty($this->birthdate_month) && ! empty($this->birthdate_day)) {
            $date            = Carbon::create($this->birthdate_year, $this->birthdate_month, $this->birthdate_day);
            $this->birthdate = $date->toDateString();

            return parent::beforeValidate();
        }

        return false;
    }


    /**
     * {@inheritDoc}
     */
    public function afterFind()
    {
        if (isset($this->birthdate)) {
            $date = Carbon::createFromFormat('Y-m-d', $this->birthdate);

            $this->birthdate_month = $date->month;
            $this->birthdate_day   = $date->day;
            $this->birthdate_year  = $date->year;
        }

        return parent::afterFind();
    }


    public function upload()
    {
        if ($this->validate()) {
            $path = 'user/avatars/full-size/' . $this->id . '_person.' . $this->photo->extension;
            $this->photo->saveAs($path);
            $this->avatar_url = "/$path";

            return true;
        } else {
            return false;
        }
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['profile_id' => 'user_id']);
    }


    public function getFullName()
    {
        return $this->first_name . ' ' . (! empty($this->middle_name) ? $this->middle_name : '') . $this->last_name;
    }


    public function getImageUrl()
    {
        return (! empty($this->avatar_url) ? $this->avatar_url : self::AVATAR_PLACEHOLDER) . '?' . Carbon::now()->timestamp;
    }
}