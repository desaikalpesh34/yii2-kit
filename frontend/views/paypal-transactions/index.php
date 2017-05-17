<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Paypal Transactions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paypal-transaction-index">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a(Yii::t('app', 'Create Paypal Transaction'), ['create'], ['class' => 'btn btn-success'])?>
    </p>
    <?php Pjax::begin(); ?>    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'user_register_email:email',
            'payment_id',
            'hash',
            'complete',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);?>
    <?php Pjax::end(); ?></div>
