<?php

/*
 * This file is part of the Dektrium project
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View                 $this
 * @var dektrium\user\models\User    $user
 * @var dektrium\user\models\Profile $profile
 */

?>

<?php $this->beginContent('@dektrium/user/views/admin/update.php', ['user' => $user]) ?>

<?php $form = ActiveForm::begin([
    'layout'                 => 'horizontal',
    'enableAjaxValidation'   => true,
    'enableClientValidation' => false,
    'fieldConfig'            => [
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-9',
        ],
    ],
]); ?>

<?=$form->field($profile, 'first_name')?>
<?=$form->field($profile, 'middle_name')?>
<?=$form->field($profile, 'last_name')?>
<?=$form->field($profile, 'gender')->dropDownList(['male' => 'male', 'female' => 'female'])?>
<?=$form->field($profile, 'birthdate')->widget(\kartik\date\DatePicker::classname())?>
<hr>
<?=$form->field($profile, 'mailing_address')?>
<?=$form->field($profile, 'city')->label('Mailing city')?>
<?=$form->field($profile, 'district')?>
<?=$form->field($profile, 'mailing_country')?>
<hr>
<?=$form->field($profile, 'current_country')?>
<?=$form->field($profile, 'phone')?>
<hr>
<h3>spouse</h3><h3>child</h3>
<hr>
<?=$form->field($profile, 'country_of_birth')?>
<?=$form->field($profile, 'city_born_in')?>
<?=$form->field($profile, 'spouse_country_of_birth')?>
<?=$form->field($profile, 'father_country_of_birth')?>
<?=$form->field($profile, 'mother_country_of_birth')?>
<hr>
<?=$form->field($profile, 'education')?>
<?=$form->field($profile, 'occupation')->textarea()?>
<hr>
<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <?php echo Html::img($profile->getImageUrl(), ['style' => 'width:300px;hieght:300px;']); ?>
    </div>
</div>
<hr>
<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <?=Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-block btn-success'])?>
    </div>
</div>

<?php ActiveForm::end(); ?>

<?php $this->endContent() ?>
