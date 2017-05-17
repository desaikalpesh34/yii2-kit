<?php
namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * {@inheritDoc}
 */
class UserPanelAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';
    public $css = [
        'user/css/semantic.css',
        'user/css/userpanel.css',
        //custom styles, provided by backend developer
        'css/site.css',
        'css/site-media.css',
    ];

    public $js = [
        'user/js/semantic.min.js',
        'user/js/panel.js',
        'https://use.fontawesome.com/webfontloader/1.6.24/webfontloader.js',
        'user/js/custom.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'bootui\asset\CoreCss',
        'bootui\asset\CoreJs',
        'kartik\icons\FlagIconAsset',
        'rmrevin\yii\fontawesome\AssetBundle',
        'frontend\assets\bower\AreYouSureAsset',
    ];
}
