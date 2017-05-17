<?php
namespace frontend\assets\bower;

use yii\web\AssetBundle;

/**
 * {@inheritDoc}
 */
class AreYouSureAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery.are-you-sure';

    public $js = [
        'jquery.are-you-sure.js',
    ];
}