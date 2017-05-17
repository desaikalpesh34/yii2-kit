<?php

namespace frontend\models;

use Carbon\Carbon;
use dektrium\user\models\Profile as BaseProfile;
use Yii;
use yii\helpers\ArrayHelper;
use yiidreamteam\upload\ImageUploadBehavior;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string  $public_email
 * @property User    $user
 *
 * Personal info
 *
 * @property string  $first_name
 * @property string  $middle_name
 * @property string  $last_name
 * @property string  $gender
 * @property string  $birthdate
 * @property string  $mailing_address
 * @property string  $city
 * @property string  $district
 * @property string  $mailing_country
 * @property string  $phone
 *
 * Spouse
 *
 * @property string  $marital_status
 * @property Person  $spouse
 *
 * Children
 *
 * @property Person  $children
 *
 * Country of eligibility
 *
 * @property string  $current_country
 * @property string  $city_born_in
 *
 * Education
 *
 * @property string $education
 * @property string $occupation
 *
 *
 * Photography
 *
 * @property string $photo_url
 *
 * Unused
 *
 * @property string $gravatar_email
 * @property string $gravatar_id
 * @property string $website
 * @property string $bio
 * @property string $timezone
 * @property array  spouses
 * @property mixed  spouse_country_of_birth
 * @property mixed  country_of_birth
 * @property mixed  father_country_of_birth
 * @property mixed  mother_country_of_birth
 * @property string  password_hash
 *
 * @mixin ImageUploadBehavior
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com
 */
class Profile extends BaseProfile
{
    const AVATAR_PLACEHOLDER = '/img/sample.png';

    public $birthdate_month;

    public $birthdate_day;

    public $birthdate_year;

    public $childrenNumber;

    public $avatar;


    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        $rules = [
            ['user_id', 'integer'],
            ['first_name', 'string', 'max' => 255],
            ['middle_name', 'string', 'max' => 255],
            ['last_name', 'string', 'max' => 255],
            ['gender', 'string', 'max' => 255],
            ['birthdate', 'date', 'format' => 'Y-m-d'],
            ['mailing_address', 'string', 'max' => 255],
            ['city', 'string', 'max' => 255],
            ['district', 'string', 'max' => 255],
            ['mailing_country', 'string', 'max' => 255],
            ['phone', 'match', 'pattern' => '/^[0-9() +-]+$/', 'message' => 'Please only use numbers.'],
            ['marital_status', 'string', 'max' => 255],
            ['current_country', 'string', 'max' => 255],
            ['education', 'string', 'max' => 255],
            ['occupation', 'string', 'max' => 255],
            ['photo_url', 'string', 'max' => 255],
            [['birthdate_month', 'birthdate_day', 'birthdate_year'], 'integer'],
            ['has_children', 'string'],
            ['avatar', 'file', 'extensions' => 'jpeg, jpg, gif, png'],
            ['avatar_url', 'string', 'max' => 255],
            [
                [
                    'country_of_birth',
                    'city_born_in',
                    'passport',
                    'spouse_country_of_birth',
                    'father_country_of_birth',
                    'mother_country_of_birth',
                ],
                'string'
            ],

            [
                ['first_name', 'last_name', 'mailing_country', 'mailing_address', 'city', 'district'],
                'required',
                'message' => 'Please fill in this field',
                'when'    => function ($model) {
                    return $model->passport == 'yes';
                },

            ],
            [
                [
                    'first_name',
                    'middle_name',
                    'last_name',
                ],
                'match',
                'pattern' => '/^[a-zA-Z ]+$/',
                'message' => 'Please only use letters.'
            ],
            [
                ['gender', 'education', 'birthdate_month', 'birthdate_day', 'birthdate_year'],
                'required',
                'message' => 'Please select your response.',
                'when'    => function ($model) {
                    return $model->passport == 'yes';
                }
            ],
            [
                ['occupation'],
                'required',
                'message'    => 'Please select your response.',
                'when'       => function ($model) {
                    return $model->education == 'Primary school only' || $model->education == 'Some high school, no diploma';
                },
                'whenClient' => "function (attribute, value) {
                    return $('#profile-education').val() == 'Primary school only' || $('#profile-education').val() == 'Some high school, no diploma' ;
                }"
            ],

        ];

        $rules = ArrayHelper::merge(parent::rules(), $rules);

        unset($rules['nameLength']);

        return $rules;
    }


    public function init()
    {
        parent::init();
        $this->on(ImageUploadBehavior::EVENT_AFTER_FILE_SAVE, function ($event) {
            Yii::$app->session->setFlash('photoUploadStatus', 'Photo Uploaded successfully');
        });
    }


    /**
     * {@inheritDoc}
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ( ! empty($this->avatar)) {
                $this->avatar_url = $this->getImageFileUrl('avatar');
            }

            return true;
        }

        return false;
    }


    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        $behaviors = [
            [
                'class'     => '\yiidreamteam\upload\ImageUploadBehavior',
                'attribute' => 'avatar',
                'thumbs'    => [
                    'thumb' => ['width' => 200, 'height' => 200],
                ],
                'filePath'  => '@webroot/user/avatars/full-size/[[pk]].[[extension]]',
                'fileUrl'   => '/user/avatars/full-size/[[pk]].[[extension]]',
                'thumbPath' => '@webroot/user/avatars/thumb/[[profile]]_[[pk]].[[extension]]',
                'thumbUrl'  => '/user/avatars/thumb/[[profile]]_[[pk]].[[extension]]',
            ],
        ];

        $behaviors = ArrayHelper::merge(parent::behaviors(), $behaviors);

        return $behaviors;
    }


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


    /**
     * {@inheritDoc}
     */
    public function beforeValidate()
    {
        if (isset($this->birthdate_year) && isset($this->birthdate_month) && isset($this->birthdate_day)) {
            $date            = Carbon::create($this->birthdate_year, $this->birthdate_month, $this->birthdate_day);
            $this->birthdate = $date->toDateString();

        }

        return parent::beforeValidate();
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpouses()
    {
        return $this->hasMany(Person::className(), ['profile_id' => 'user_id'])
                    ->where(['type_of_relation' => Person::SPOUSE]);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(Person::className(), ['profile_id' => 'user_id'])
                    ->where(['type_of_relation' => Person::CHILD]);
    }


    public function getUserId()
    {
        return $this->attributes['user_id'];
    }


    public function getImageUrl()
    {
        return (! empty($this->avatar_url) ? $this->avatar_url : self::AVATAR_PLACEHOLDER) . '?' . Carbon::now()->timestamp;
    }


    //TODO move to util plugin
    private static function notEmpty($fields, $reverse = false)
    {
        foreach ($fields as $field) {
            if (empty($field)) {
                return $reverse ? true : false;
            }
        }

        return $reverse ? false : true;
    }


    public function getFilledPages()
    {
        $filledPages = [
            'personal'    => false,
            'spouse'      => false,
            'children'    => false,
            'country'     => false,
            'education'   => false,
            'photographs' => false,
        ];
        $children    = $this->children;

        if (self::notEmpty([
            $this->first_name,
            $this->last_name,
            $this->gender,
            $this->birthdate,
            $this->mailing_address,
            $this->city,
            $this->district,
            $this->current_country,
        ])
        ) {
            $filledPages['personal'] = true;
        }

        if ($this->hasSpouse()) {
            $spouse = $this->spouses[0];
            /** @var Person $spouse */
            if (self::notEmpty([
                $this->marital_status,
                $spouse->first_name,
                $spouse->last_name,
                $spouse->gender,
                $spouse->birthdate,
                $spouse->city_of_birth,
                $spouse->country_of_birth,
            ])
            ) {
                $filledPages['spouse'] = true;
            }
        }

        /** @var Person $child */
        if ($this->hasChildren()) {

            $childrenFilled = true;
            foreach ($children as $child) {
                if (self::notEmpty([
                    $child->first_name,
                    $child->last_name,
                    $child->gender,
                    $child->birthdate,
                    $child->city_of_birth,
                ], true)
                ) {
                    $childrenFilled = false;
                }
            }
            $filledPages['children'] = $childrenFilled;
        }

        if (self::notEmpty([$this->country_of_birth, $this->city_born_in])) {
            $filledPages['country'] = true;
        }

        if ( ! empty($this->education && ($this->education != 'Primary school only' || $this->education != 'Some high school, no diploma'))) {
            $filledPages['education'] = true;
        } elseif (self::notEmpty([$this->education, $this->occupation])) {
            $filledPages['education'] = true;
        }

        if ( ! empty($this->avatar_url) && $this->avatar_url != self::AVATAR_PLACEHOLDER) {
            $filledPages['photographs'] = true;
        }

        return $filledPages;
    }


    /**
     * @return bool
     */
    public function hasSpouse()
    {
        if ($this->marital_status === 'Married and my spouse is NOT a U.S. citizen or a U.S. Lawful Permanent Resident (LPR)' || $this->marital_status === 'Married and my spouse IS a U.S. citizen or a U.S. Lawful Permanent Resident (LPR)') {
            return true;
        } else {
            return false;
        }
    }


    public function getFullName()
    {
        return $this->first_name . (! empty($this->middle_name) ? ' ' . $this->middle_name . ' ' : ' ') . $this->last_name;
    }


    private function hasChildren()
    {
        if ($this->has_children === 'yes') {
            return true;
        } else {
            return false;
        }
    }
}