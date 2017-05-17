<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PaypalTransaction */

$this->title = Yii::t('app', 'Create Paypal Transaction');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paypal Transactions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paypal-transaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
