<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Menu;

/** @var app\components\userMenu\UserMenu $context */
$context = $this->context;
?>



<div class="ui raised card">
    <div class="content">
        <div class="home">
            <?php echo Html::a('<i class="fa fa-home" aria-hidden="true"></i> Home - Account Summary', Url::to('/user/settings/status')); ?>
        </div>
    </div>
    <div class="content">
        <p class="reg">Registration</p>
        <ul>
            <li>Personal Information</li>
            <ul>
                <li>
                    <a <?php echo $context->isActive('personal') ? 'id="chosen"' : ''; ?> href="<?php echo Url::to('/user/settings/personal'); ?>"><i class="<?php echo $context->getCircle('personal'); ?>" aria-hidden="true"></i> Personal</a>
                </li>
                <li>
                    <a <?php echo $context->isActive('spouse') ? 'id="chosen"' : ''; ?> href="<?php echo Url::to('/user/settings/spouse'); ?>"><i class="<?php echo $context->getCircle('spouse'); ?>" aria-hidden="true"></i> Spouse</a>
                </li>
                <li>
                    <a <?php echo $context->isActive('children') ? 'id="chosen"' : ''; ?> href="<?php echo Url::to('/user/settings/children'); ?>"><i class="<?php echo $context->getCircle('children'); ?>" aria-hidden="true"></i> Children</a>
                </li>
            </ul>
            <div class="line"></div>
            <li>
                <a <?php echo $context->isActive('country') ? 'id="chosen"' : ''; ?> href="<?php echo Url::to('/user/settings/country'); ?>"><i class="<?php echo $context->getCircle('country'); ?>" aria-hidden="true"></i> Country of Eligibility</a>
            </li>
            <div class="line"></div>
            <li>
                <a <?php echo $context->isActive('education') ? 'id="chosen"' : ''; ?> href="<?php echo Url::to('/user/settings/education'); ?>"><i class="<?php echo $context->getCircle('education'); ?>" aria-hidden="true"></i> Education</a>
            </li>
            <div class="line"></div>
            <li>
                <a <?php echo $context->isActive('photographs') ? 'id="chosen"' : ''; ?> href="<?php echo Url::to('/user/settings/photographs'); ?>"><i class="<?php echo $context->getCircle('photographs'); ?>" aria-hidden="true"></i> Photographs</a>
            </li>
        </ul>
    </div>
</div>