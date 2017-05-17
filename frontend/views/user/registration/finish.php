<?php
/* @var $this \yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

?>
<div class="reg-block clearfix">
    <div class="row">


        <div class="col-md-8 col-md-offset-2">
            <div class="cir-container clearfix">
                <div class="step-container">
                    <div class="circle text-center floatl s1 of circle-finish">
                        <span class="of-num num-finished">1</span>
                    </div>
                    <div class="step-text">
                        <span class="finish-text">Choose the Service <i class="fa fa-check"
                                                                        aria-hidden="true"></i></span>
                    </div>
                </div>

                <div class="step-container">
                    <div class="circle text-center floatl s1 of circle-finish">
                        <span class="of-num num-finished">2</span>

                    </div>
                    <div class="step-text">
                        <span class="finish-text">Process Payment <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>

                <div class="step-container">
                    <div class="circle text-center floatl s1 of">
                        <span class="of-num">3</span> of <span class="of-num">3</span>

                    </div>
                    <div class="step-text">
                        <span>Register</span>
                    </div>
                </div>

            </div>
        </div> <!-- circles end -->
    </div>
    <div class="row m40">
        <div class="col-md-8 col-md-offset-2 text-center">
            <h2>Great news!</h2>
            <h3>Your payment has been processed!</h3>
            <h3>You can now register!</h3>
            <p>A service confirmation email has been sent to the email address you provided.</p>
            <p>In this email you will find a temporary password that you are supposed to use to enter our client-portal
                where you will complete your registration. </p>
            <p>After you log in for the first time you will be prompted to change your password.</p>
            <p>Good luck!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="login-block">
                <?php $form = ActiveForm::begin([
                    'id'                     => 'login-form',
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                    'validateOnBlur'         => false,
                    'validateOnType'         => false,
                    'validateOnChange'       => false,
                ]) ?>

                <?=$form->field($model, 'login', ['inputOptions' => ['autofocus' => 'autofocus', 'placeholder' => 'Email']])->label(false);?>

                <?=$form->field($model, 'password', ['inputOptions' => ['autofocus' => 'autofocus', 'placeholder' => 'Temporary Password']])->passwordInput()->label(false)?>


                <?=Html::submitButton('Login', ['class' => 'ui primary button fluid mg', 'name' => 'login-button'])?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>

    </div>

</div>