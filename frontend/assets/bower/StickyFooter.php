<?php
namespace frontend\assets\bower;

use yii\web\AssetBundle;

/**
 * {@inheritDoc}
 */
class StickyFooter extends AssetBundle
{
    public $sourcePath = '@bower/jquery.stickyFooter/dist';

    public $js = [
        'jquery.stickyFooter.min.js',
    ];
}