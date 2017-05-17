<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use kartik\checkbox\CheckboxX;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View                   $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module           $module
 */

$this->title                   = Yii::t('user', 'Log in');
$this->params['breadcrumbs'][] = $this->title;
\app\assets\UserAsset::register($this);
?>

<?=$this->render('/_alert', ['module' => Yii::$app->getModule('user')])?>

<div class="row">
    <div class="col-md-5 col-md-offset-4 fh">
        <div class="wrapper">
            <div class="login-box text-center">
                <img class="mg logo-login" src="/img/logo-blk.png" alt="">

                <!-- Login -->
                <div class="login-block">
                    <?php $form = ActiveForm::begin([
                        'id'                     => 'login-form',
                        'enableAjaxValidation'   => true,
                        'enableClientValidation' => false,
                        'validateOnBlur'         => false,
                        'validateOnType'         => false,
                        'validateOnChange'       => false,
                    ]) ?>

                    <?=$form->field($model, 'login', [
                        'inputOptions' => [
                            'autofocus'   => 'autofocus',
                            'placeholder' => 'Email',
                            'class'       => 'form-control',
                            'tabindex'    => '1'
                        ],
                    ])->label(false);?>

                    <?=$form->field($model, 'password', [
                        'inputOptions' => [
                            'class'       => 'form-control',
                            'placeholder' => 'Password',
                            'tabindex'    => '2'
                        ],
                    ])->passwordInput()->label(false);?>

                    <?=$form->field($model, 'rememberMe')->widget(CheckboxX::classname(), [
                        'pluginOptions' => [
                            'threeState' => false,
                            'tabindex'   => '3'
                        ],
                    ])->label('Remember me');?>

                    <?=Html::submitButton(Yii::t('user', 'Sign in'),
                        ['class' => 'ui primary button fluid mg', 'tabindex' => '4'])?>


                    <div class="nologin">
                        <?php echo $module->enablePasswordRecovery ? Html::a(Yii::t('user', "Can't login?"),
                            ['/user/recovery/request'], ['tabindex' => '4']) : ''; ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>

            </div>
        </div>
    </div>
</div>