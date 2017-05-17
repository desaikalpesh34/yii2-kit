<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\models\UserSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;

/**
 * @var View $this
 * @var ActiveDataProvider $dataProvider
 * @var UserSearch $searchModel
 * @var \app\models\User $data
 */

$this->title = Yii::t('user', 'Manage users');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', [
    'module' => Yii::$app->getModule('user'),
]) ?>

<?= $this->render('/admin/_menu') ?>

<?php Pjax::begin() ?>

<?= GridView::widget([
    'dataProvider'  =>  $dataProvider,
    'filterModel'   =>  $searchModel,
    'layout'        =>  "{items}\n{pager}",
    'columns' => [
        [
            'header' => 'First name',
            'value' => function ($data) {return $data->profile->first_name;},
        ],
        [
            'header' => 'Last name',
            'value' => function ($data) {return $data->profile->last_name;},
        ],
        'email:email',
        [
            'header' => 'Phone Number',
            'value' => function ($data) {return $data->profile->phone;},
        ],
        [
            'header' => 'Plan',
            'value' => function ($data) {return $data->paymentPlan;},
        ],
        [
            'header' => 'Date of Payment',
            'attribute' => 'created_at',
            'value' => function ($model) {
                if (extension_loaded('intl')) {
                    return Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model->created_at]);
                } else {
                    return date('Y-m-d G:i:s', $model->created_at);
                }
            },
        ],
        [
            'header' => 'Lottery Year',
            'value' => function ($data) {return $data->lotteryYear;},
        ],
        [
            'header' => Yii::t('user', 'Confirmation'),
            'value' => function ($model) {
                if ($model->isConfirmed) {
                    return '<div class="text-center">
                                <span class="text-success">' . Yii::t('user', 'Confirmed') . '</span>
                            </div>';
                } else {
                    return Html::a(Yii::t('user', 'Confirm'), ['confirm', 'id' => $model->id], [
                        'class' => 'btn btn-xs btn-success btn-block',
                        'data-method' => 'post',
                        'data-confirm' => Yii::t('user', 'Are you sure you want to confirm this user?'),
                    ]);
                }
            },
            'format' => 'raw',
            'visible' => Yii::$app->getModule('user')->enableConfirmation,
        ],
        [
            'header' => 'Application Details',
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}',
            'buttons' => [
                'update' => function ($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('yii', 'Update'),
                        'aria-label' => Yii::t('yii', 'Update'),
                        'class' => 'btn btn-primary',
                        'data-pjax' => '0',
                    ];
                    return Html::a('View', $url, $options);
                }
            ],
        ],
        [
            'header'   => 'Payment Confirmation Email',
            'class'    => 'yii\grid\ActionColumn',
            'template' => '{view}',
            'buttons'  => [
                'view' => function ($url, $model, $key) {
                    $options = [
                        'title'      => Yii::t('yii', 'Update'),
                        'aria-label' => Yii::t('yii', 'Update'),
                        'class'      => 'btn btn-primary',
                        'data-pjax'  => '0',
                    ];

                    return Html::a('View', Url::to([
                        'show-email',
                        'id'          => $model->id,
                        'typeOfEmail' => \app\controllers\user\AdminController::EMAIL_TYPE_REGISTRATION_EMAIL,
                    ]), $options);

                },
            ],
        ],
        [
            'header'   => 'Congratulations Email',
            'class'    => 'yii\grid\ActionColumn',
            'template' => '{view}',
            'buttons'  => [
                'view' => function ($url, $model, $key) {
                    $options = [
                        'title'      => Yii::t('yii', 'Update'),
                        'aria-label' => Yii::t('yii', 'Update'),
                        'class'      => 'btn btn-primary',
                        'data-pjax'  => '0',
                    ];

                    return Html::a('View', Url::to([
                        'show-email',
                        'id'          => $model->id,
                        'typeOfEmail' => \app\controllers\user\AdminController::EMAIL_TYPE_CONGRATULATIONS_EMAIL,
                    ]), $options);

                },
            ],
        ],
        [
            'header'   => 'Re-register Email',
            'class'    => 'yii\grid\ActionColumn',
            'template' => '{view}',
            'buttons'  => [
                'view' => function ($url, $model, $key) {
                    $options = [
                        'title'      => Yii::t('yii', 'Update'),
                        'aria-label' => Yii::t('yii', 'Update'),
                        'class'      => 'btn btn-primary',
                        'data-pjax'  => '0',
                    ];

                    return Html::a('View', Url::to([
                        'show-email',
                        'id'          => $model->id,
                        'typeOfEmail' => \app\controllers\user\AdminController::EMAIL_TYPE_RE_REGISTER_EMAIL,
                    ]), $options);

                },
            ],
        ],
    ],
]); ?>

<?php Pjax::end() ?>
