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

$this->title                   = Yii::t('user', 'Reset your password');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-5 col-md-offset-4 fh">
        <div class="wrapper">
            <div class="login-box text-center">
                <img class="mg logo-login" src="/img/logo-blk.png" algt="">

                <div class="forgot-03 ">
                    <h3>Choose a new password</h3>
                    <p>Please enter and confirm a new password for your account: <?php echo $userEmail; ?></p>

                    <?php $form = ActiveForm::begin([
                        'id'                     => 'password-recovery-form',
                        'enableAjaxValidation'   => true,
                        'enableClientValidation' => false,
                    ]); ?>

                    <?=$form->field($model, 'password')->passwordInput(['placeholder' => 'Enter a new password'])
                            ->label(false)?>

                    <?=$form->field($model, 'passwordConfirm')
                            ->passwordInput(['placeholder' => 'Confirm your new password'])->label(false)?>

                    <?=Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'btn btn-success btn-block'])?>
                    <br>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
