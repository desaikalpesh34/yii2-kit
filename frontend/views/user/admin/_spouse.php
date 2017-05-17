<?php
/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */
/**
 * @var yii\widgets\ActiveForm $form
 * @var \app\models\Person     $spouse
 */
use yii\bootstrap\ActiveForm;

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

<?php if ( ! empty($spouse)) : ?>
    <?=$form->field($spouse, 'first_name')?>
    <?=$form->field($spouse, 'middle_name')?>
    <?=$form->field($spouse, 'last_name')?>
    <?=$form->field($spouse, 'gender')->dropDownList(['male' => 'male', 'female' => 'female'])?>
    <?=$form->field($spouse, 'birthdate')->widget(\kartik\date\DatePicker::classname())?>
    <hr>
    <?=$form->field($spouse, 'country_of_birth')->label('Mailing country')?>
    <?=$form->field($spouse, 'city_of_birth')->label('Mailing city')?>
<?php else : ?>
    <h2>User has no spouse</h2>
<?php endif; ?>

<?php ActiveForm::end(); ?>
<?php $this->endContent() ?>