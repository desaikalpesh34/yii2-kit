<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

/*
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\RecoveryForm $model
 */

use yii\bootstrap\Html;
use yii\helpers\Url;

$this->title                   = Yii::t('user', 'Forgot your password?');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-5 col-md-offset-4 fh">
        <div class="wrapper">
            <div class="login-box text-center">
                <img class="mg logo-login" src="/img/logo-blk.png" algt="">

                <div class="forgot-02 ">
                    <?=Html::beginForm(Url::current(), 'get', ['csrf' => false]);?>

                    <h3 class="blue">Enter Validation Code</h3>
                    <p class="blue">
                        In order to ensure your account security, we have sent a verification code to the email address
                        you provided.
                    </p>
                    <p class="blue">
                        Please check your email for the code.
                    </p>
                    <p class="blue">You may need to check your Junk or Spam folder.</p>
                    <div class="form-group">
                        <?=Html::textInput('code', '', [
                            'class'       => 'form-control',
                            'autofocus'   => 'autofocus',
                            'placeholder' => 'Validation Code',
                        ])?>
                    </div>
                    <!--<p>Didn't receive the email? <br> <a href="#">Send it again.</a></p>-->
                    <?=Html::submitButton('Submit', [
                        'class'    => 'ui primary button fluid mg',
                        'tabindex' => '2'
                    ])?>

                    <?=Html::endForm();?>
                </div>

            </div>
        </div>
    </div>
</div>