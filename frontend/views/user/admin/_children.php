<?php
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

<?php if ( ! empty($children)) : ?>
    <?php foreach ($children as $i => $child): ?>
        <h3>Child <?php echo $i; ?></h3>
        <?=$form->field($child, 'first_name')?>
        <?=$form->field($child, 'middle_name')?>
        <?=$form->field($child, 'last_name')?>
        <?=$form->field($child, 'gender')->dropDownList(['male' => 'male', 'female' => 'female'])?>
        <?=$form->field($child, 'birthdate')->widget(\kartik\date\DatePicker::classname())?>
        <hr>
        <?=$form->field($child, 'country_of_birth')->label('Mailing country')?>
        <?=$form->field($child, 'city_of_birth')->label('Mailing city')?>
    <?php endforeach; ?>
<?php else : ?>
    <h2>User has no children</h2>
<?php endif; ?>

<?php ActiveForm::end(); ?>
<?php $this->endContent() ?>