<?php
/**
 * @var yii\web\View $this
 */
use app\helpers\YearsGenerator;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

$this->title = Yii::t('user', 'Profile settings');
?>
<div class="content">

    <h2>Personal Information - Children</h2>

    <?php $form = ActiveForm::begin([
        'options' => ['id' => 'children-form', 'class' => 'ui form children segment', 'enableAjaxValidation' => true],
    ]) ?>
    <div class="children">

        <h3 class="child_title">Do you have children?</h3>

        <?=$form->field($profile, 'has_children', [
            'inputOptions' => [
                'placeholder' => 'Select',
            ],
        ])->dropDownList([
            'yes' => 'Yes',
            'no'  => 'No',
        ], ['class' => 'ui selection dropdown field', 'prompt' => 'Select'])->label(false)?>

        <?php
        $script = <<< JS
                $('#profile-has_children').change(function () {
                 $('#children-submit').click();
            });
JS;
        $this->registerJs($script);
        ?>

        <div class="alert alert-warning wrn">Please Note: If you have children and you fail to list all of them in the
            registration, it will result in your disqualification from the program! You will not be issued a Green Card
            if you win the Green Card Lottery.
        </div>
    </div>


    <div class="children_block inactive">
        <!--<div class="children_block">-->


        <h3>How many children do you have?</h3>


        <?=$form->field($profile, 'childrenNumber', [
            'inputOptions' => [
                'placeholder' => 'Number of Children',
            ],
        ])->dropDownList([
            '1'  => '1',
            '2'  => '2',
            '3'  => '3',
            '4'  => '4',
            '5'  => '5',
            '6'  => '6',
            '7'  => '7',
            '8'  => '8',
            '9'  => '9',
            '10' => '10',
            '11' => '11',
            '12' => '12',
            '13' => '13',
            '14' => '14',
            '15' => '15',
            '16' => '16',
            '17' => '17',
            '18' => '18',
        ], ['class' => 'ui selection dropdown field', 'prompt' => 'Number of Children', 'value' => $childrenNumber])
                ->label(false)?>

        <?=Html::submitButton('submit', ['id' => 'children-submit', 'style' => 'display:none'])?>

        <?php ActiveForm::end(); ?>


        <div class="alert alert-success wrn">For the following, please be sure to ONLY list: <br>
            <br>
            1) All living natural children that are unmarried and under 21 years of age.

            and/or <br>

            2) All living children legally adopted by you that are unmarried and under 21 years of age.
            and/or <br>
            3) All living step-children that are unmarried and under 21 years of age, even if you are no longer legally
            married to the child’s parent, and even if the child does not currently reside with you and/or will not
            immigrate to the United States with you.
        </div>

        <?php
        $script = <<< JS
                $('#profile-childrennumber').change(function () {
                 window.location.href = "/user/settings/children?childrenNumber=" + $(this).val();
            });
JS;
        $this->registerJs($script);
        ?>

        <?php $form = ActiveForm::begin() ?>

        <?php foreach ($children as $i => $child): ?>

            <div class="child_card">

                <h3>Child <?php echo $i + 1; ?></h3>

                <?=$form->field($child, "[$i]first_name",
                    ['inputOptions' => ['placeholder' => 'Enter Your First Name']])?>

                <?=$form->field($child, "[$i]middle_name",
                    ['inputOptions' => ['placeholder' => 'Enter Your Middle Name']])?>

                <?=$form->field($child, "[$i]last_name",
                    ['inputOptions' => ['placeholder' => 'Enter Your Last Name']])?>
                <br>

                <?=$form->field($child, "[$i]gender", [
                    'template'     => '{label} <div class="field">{input}{error}{hint}</div>',
                    'inputOptions' => [
                        'placeholder' => 'Gender',
                    ],
                ])->dropDownList([
                    'male'   => 'Male',
                    'female' => 'Female',
                ], ['class' => 'ui dropdown selection', 'prompt' => 'Gender'])->label('Select your gender')?>

                <?=$form->field($child, "[$i]birthdate_month", [
                    'template'     => '{label} <div class="field">{input}{error}{hint}</div>',
                    'inputOptions' => [
                        'placeholder' => 'Month',
                    ],
                ])->dropDownList([
                    '1'  => 'January',
                    '2'  => 'February',
                    '3'  => 'March',
                    '4'  => 'April',
                    '5'  => 'May',
                    '6'  => 'June',
                    '7'  => 'July',
                    '8'  => 'August',
                    '9'  => 'September',
                    '10' => 'September',
                    '11' => 'November',
                    '12' => 'December',
                ], ['class' => 'ui dropdown selection', 'prompt' => 'Month'])->label('Birthdate')?>


                <?=$form->field($child, "[$i]birthdate_day", [
                    'template'     => '{label} <div class="field">{input}{error}{hint}</div>',
                    'inputOptions' => [
                        'placeholder' => 'Day',
                    ],
                ])->dropDownList([
                    '1'  => '1',
                    '2'  => '2',
                    '3'  => '3',
                    '4'  => '4',
                    '5'  => '5',
                    '6'  => '6',
                    '7'  => '7',
                    '8'  => '8',
                    '9'  => '9',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12',
                    '13' => '13',
                    '14' => '14',
                    '15' => '15',
                    '16' => '16',
                    '17' => '17',
                    '18' => '18',
                    '19' => '19',
                    '20' => '20',
                    '21' => '21',
                    '22' => '22',
                    '23' => '23',
                    '24' => '24',
                    '25' => '25',
                    '26' => '26',
                    '27' => '27',
                    '28' => '28',
                    '29' => '29',
                    '30' => '30',
                    '31' => '31',
                ], ['class' => 'ui dropdown selection', 'prompt' => 'Day'])->label(false)?>

                <?=$form->field($child, "[$i]birthdate_year", [
                    'template'     => '{label} <div class="field">{input}{error}{hint}</div>',
                    'inputOptions' => [
                        'placeholder' => 'Year',
                    ],
                ])->dropDownList(YearsGenerator::generate(), ['class' => 'ui dropdown selection', 'prompt' => 'Year'])->label(false)?>

                <?=$form->field($child, "[$i]country_of_birth",
                    ['inputOptions' => ['placeholder' => "Enter Your Child's Country of Birth"]])
                        ->label('Your Child’s Country of Birth:')?>

                <?=$form->field($child, "[$i]city_of_birth",
                    ['inputOptions' => ['placeholder' => "Enter Your Child's City of Birth"]])
                        ->label('Your Child’s City/Town of Birth:')?>
            </div>
        <?php endforeach; ?>
        <br>
        <?=Html::submitButton('Save', ['class' => 'ui primary button big'])?>
        <?=Html::submitButton('Save &amp; Continue', ['class' => 'ui primary button big', 'name' => 'continue'])?>
        <?=Html::submitButton('', ['id' => 'are-you-leaving-modal', 'class' => 'hidden', 'name' => 'modal'])?>
        <?php ActiveForm::end(); ?>
    </div>
    <?php if ($profile->has_children == 'no') : ?>
        <?=Html::a('Save', \yii\helpers\Url::current(), ['class' => 'ui primary button big'])?>
        <?=Html::a('Save &amp; Continue', \yii\helpers\Url::to('country'), ['class' => 'ui primary button big', 'name' => 'continue'])?>
        <?=Html::submitButton('', ['id' => 'are-you-leaving-modal', 'class' => 'hidden', 'name' => 'modal'])?>
    <?php endif; ?>
</div>