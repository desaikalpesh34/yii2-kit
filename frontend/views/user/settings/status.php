<?php
/**
 * @var yii\web\View        $this
 * @var \app\models\Profile $profile
 */
$this->title = Yii::t('user', 'Profile settings');
?>

<h2>Home</h2>
<div class="ui segment">
    <div class="content">
        <h3>Hi, <?php echo "$profile->first_name $profile->last_name"; ?></h3>
        <p>Welcome to the client-portal!</p>
        <p>Here you will complete your registration.</p>

        <p>If you get married, divorced, have any children, and/or need to change any details after you complete
            your registration you will be able to modify your registration here on the Client-Portal.</p>
        <p>Registration modifications will only be permitted until October 1<sup>st</sup> 2016. After this date,
            your registration will be formally entered into the United States Government’s Green Card Lottery.
        </p>
        <p>You will have 24/7 access to your Client-Portal.</p>
        <h4>Good luck!</h4>
    </div>
    <div class="ui divider"></div>
    <h3>Account Summary</h3>
    <ul>
        <li><strong>Registration Plan:</strong> <?php echo ucfirst($paymentPlan); ?></li>
        <li><strong>Payment:</strong> Complete</li>
        <li>
            <strong>Registration Status:</strong>
            <?php if ($isStatusComplete) : ?>
                <span class="complete">Successfully Completed</span>
            <?php else : ?>
                <span class="incomplete">Incomplete</span>
            <?php endif; ?>
        </li>
    </ul>
</div>

<a href="<?php echo \yii\helpers\Url::to('personal'); ?>" class="ui primary button large">Begin Registration</a>
