<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use kartik\growl\Growl;

/**
 * @var dektrium\user\Module $module
 */
?>

<?php /* if ($module->enableFlashMessages): ?>
    <?php foreach (Yii::$app->session->getAllFlashes() as $type => $message): ?>
        <?php if (in_array($type, ['success', 'danger', 'warning', 'info'])): ?>

            <?php
            $messageIcon = [
                'success' => 'glyphicon glyphicon-ok-sign',
                'danger'  => 'glyphicon glyphicon-remove-sign',
                'warning' => 'glyphicon glyphicon-exclamation-sign',
                'info'    => 'glyphicon glyphicon-info-sign'
            ];

            $options = [
                'type'          => $type,
                'title'         => ucfirst($type),
                'icon'          => $messageIcon[$type],
                'body'          => $message,
                'showSeparator' => true,
                'delay'         => 0,
                'pluginOptions' => [
                    'showProgressbar' => true,
                    'placement'       => [
                        'from'  => 'top',
                        'align' => 'center',
                    ],
                ],
            ];

            if (isset($autoclose) && ! $autoclose) {
                $options['pluginOptions']['delay'] = 0;
            }

            ?>

            <?php echo Growl::widget($options); ?>
        <?php endif ?>
    <?php endforeach ?>
<?php endif */ ?>