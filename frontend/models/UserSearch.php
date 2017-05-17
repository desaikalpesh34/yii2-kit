<?php

namespace frontend\models;

use dektrium\user\models\UserSearch as BaseUserSearch;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * {@inheritDoc}
 * @property Profile $profile
 */
class UserSearch extends BaseUserSearch
{
    public $first_name;


    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        return [
            'fieldsSafe'     => [['username', 'email', 'registration_ip', 'created_at', 'first_name'], 'safe'],
            'createdDefault' => ['created_at', 'default', 'value' => null],
        ];
    }


    /** @inheritdoc */
    public function attributeLabels()
    {
        return [
            'username'        => Yii::t('user', 'Username'),
            'email'           => Yii::t('user', 'Email'),
            'created_at'      => Yii::t('user', 'Date of Payment'),
            'registration_ip' => Yii::t('user', 'Registration ip'),
        ];
    }


    /**
     * {@inheritDoc}
     */
    public function search($params)
    {
        $query = $this->finder->getUserQuery();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ( ! ($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        if ($this->created_at !== null) {
            $date = strtotime($this->created_at);
            $query->andFilterWhere(['between', 'created_at', $date, $date + 3600 * 24]);
        }

        $query->andFilterWhere(['like', 'username', $this->username])->andFilterWhere(['like', 'email', $this->email])
              ->andFilterWhere(['registration_ip' => $this->registration_ip]);

        return $dataProvider;
    }
}