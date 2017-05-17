<?php
/**
 * @var \yii\web\View $this
 */
?>

<div class="email">
    <div>
        <?php echo $emailHtml; ?>
    </div>
    <div class="action-bar">
        <?php echo \yii\helpers\Html::a('Resend Email',
            \yii\helpers\Url::to(['resend-email', 'userId' => $userId, 'typeOfEmail' => $typeOfEmail]),
            ['class' => 'btn btn-primary']); ?>
    </div>
</div>

