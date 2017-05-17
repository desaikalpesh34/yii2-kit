<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\components\userMenu\UserMenu;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

\app\assets\UserPanelAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="leaveModal" class="ui modal small h186">
    <i class="close icon"></i>
    <div class="header">
        You are leaving without saving.
    </div>
    <div class="content">
        Are you sure you want to leave this section without saving your changes?
    </div>
    <div class="actions">
        <a id="leave-without-saving" href="#" class="ui button">Leave Section Without Saving Changes</a>
        <button id="save-and-leave" href="#" class="ui button">Save & Leave Section</button>
        <div class="ui cancel button">Stay</div>
    </div>
</div>

<div class="container-fluid">
    <div class="row header-row">
        <div class="col-md-12">
            <div class="header">
                <a href="<?php echo Url::home(); ?>">
                    <img src="<?php echo Url::base(); ?>/img/logo-blk.png" alt="">
                </a>
                <div class="pull-right logout">
                    <a id="settings" href="#">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                    </a>
                    <span class="loggedin"><?php echo $this->params['userEmail']; ?></span>
                    <?php echo Html::a('Log Out', Url::to('/user/logout'),
                        ['class' => ['ui', 'blue', 'basic', 'button'], 'data-method' => 'post']); ?>
                </div>

            </div>
        </div>
    </div>

    <?= $this->render('/_alert', ['module' => Yii::$app->getModule('user'), 'autoclose' => false]) ?>

    <div class="main-wrap user-panel">
        <div class="row">
            <div class="col-md-2 sidebar">
                <?php echo UserMenu::widget(); ?>
            </div>
            <div class="col-md-10">
                <?= $content ?>
            </div>
        </div>
        <div class="row footer">
            <div class="col-md-12 text-right">
                <footer>
                    Customer
                    Service: <?php echo Yii::$app->params['contactPhone'] . ' ' . Yii::$app->params['contactEmail']; ?>
                </footer>
            </div>
        </div>
    </div>


    <?php
    if (Yii::$app->session->get('password-modal')) {
        $this->registerJs(
            <<<JS
          $('.ui.modal.modalcont').modal('show');
JS
        );
    }

    ?>

    <div class="ui modal small  modalcont ">
        <i class="close icon"></i>
        <div class="header">
            Settings
        </div>
        <div class="content">

            <?php $form = ActiveForm::begin([
                'action' => Url::to('reset-password'),
                'options' => [
                    'class' => 'ui form pass'
                ]
            ]) ?>

            <?php $passwordResetForm = $this->params['passwordResetForm']; ?>

            <?= $form->field($passwordResetForm, 'oldPassword')->passwordInput(['placeholder' => "Enter Your Current Password"])->label('Current Password ') ?>

            <?= $form->field($passwordResetForm, 'newPassword')->passwordInput(['placeholder' => "Enter Your New Password"])->label('New Password') ?>

            <?= $form->field($passwordResetForm, 'newPasswordConfirm')->passwordInput(['placeholder' => "Enter Your New Password"])->label('Confirm New Password') ?>

            <br>
            <div class="ui error message"></div>
            <?= Html::submitButton('Change Password', ['class' => 'ui primary button big']) ?>
            <br> <br> <br> <br>


            <?php ActiveForm::end() ?>
        </div>
    </div>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
