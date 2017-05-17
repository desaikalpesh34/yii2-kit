<?php

/* @var $this \yii\web\View */
/* @var $content string */

use utilphp\util;
use yii\helpers\Html;
use yii\helpers\Url;

\app\assets\UserAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
<head>
    <meta charset="<?=Yii::$app->charset?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?=Html::csrfMetaTags()?>
    <title><?=Html::encode($this->title)?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?=$this->render('/_alert', ['module' => Yii::$app->getModule('user')])?>

<?php echo \app\components\header\Header::widget(['scroll' => false]); ?>

<div class="main-wrap">
    <div class="container">
        <?=$content?>
    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
