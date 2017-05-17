<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/*
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\RecoveryForm $model
 */

$this->title                   = Yii::t('user', 'Forgot your password?');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php //echo  $this->render('/_alert', ['module' => Yii::$app->getModule('user')])?>

<div class="row">
    <div class="col-md-5 col-md-offset-4 fh">
        <div class="wrapper">
            <div class="login-box text-center">
                <img class="mg logo-login" src="/img/logo-blk.png" algt="">

                <div class="forgot-01 ">
                    <?php $form = ActiveForm::begin([
                        'id'                     => 'password-recovery-form',
                        'enableClientValidation' => true,
                    ]); ?>

                    <h3 class="forgot">Forgot your password?</h3>
                    <p>Enter your email address and we'll help you reset your password.</p>

                    <?=$form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'Email'])
                            ->label(false)?>

                    <?=$form->field($model, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className(),
                        ['siteKey' => '6Ld6DAoUAAAAAIgc6HL0TW5wAlv6bQ-ebjWUcgg7'])->label(false)?>

                    <?=Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'btn btn-primary btn-block'])?><br>

                    <?php ActiveForm::end(); ?>
                </div>

            </div>
        </div>
    </div>
</div>
