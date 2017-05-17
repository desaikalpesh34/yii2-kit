<?php
/* @var $this \yii\web\View */
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use utilphp\util;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $content string */

$this->beginContent('@frontend/views/layouts/base.php')
?>

    <?= $this->render('.././user/_alert', ['module' => Yii::$app->getModule('user')])?>
    <?php echo \common\components\header\Header::widget(); ?>
    <div class="main-wrap <?php echo \yii\helpers\Url::current() == \yii\helpers\Url::toRoute('site/index') ? 'home' : ''; ?>">
    <?=$content?>
    </div>

    <div class="container-fluid footr">
        <div class="row">
            <div class="footer">
                <p>USA IMMIGRATIONS ORGANIZATION © 2016
                    <a href="<?php echo \yii\helpers\Url::to(['site/privacy-policy']); ?>">PRIVACY POLICY</a> |
                    <a href="<?php echo \yii\helpers\Url::to(['site/terms-and-conditions']); ?>">TERMS & CONDITIONS</a>
                </p>
            </div>
        </div>
    </div>
    <?php /* ?><div class="container">

        <?php echo Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?php if(Yii::$app->session->hasFlash('alert')):?>
            <?php echo \yii\bootstrap\Alert::widget([
                'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
                'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
            ])?>
        <?php endif; ?>

        <!-- Example of your ads placing -->
        <?php echo \common\widgets\DbText::widget([
            'key' => 'ads-example'
        ]) ?>

        <?php echo $content ?>

    </div><?php */ ?>
<?php $this->endContent() ?>