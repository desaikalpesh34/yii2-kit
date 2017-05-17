<?php
namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * {@inheritDoc}
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
        //From markup
        'css/style.css',
        'css/semantic.css',
        'css/test.css',
        //Custom
        'css/site.css',
        'css/site-media.css'
    ];

    public $js = [
        'js/smoothscroll.js',
        'js/jquery.boxloader.min.js',
        'js/jquery.waypoints.min.js',
        'js/counter.js',
        'js/semantic.min.js',
        'js/test.js',
        'js/customs.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'bootui\asset\CoreCss',
        //'bootui\asset\CoreJsMin',
        'yii\bootstrap\BootstrapPluginAsset',
        'kartik\icons\FlagIconAsset',
        'rmrevin\yii\fontawesome\AssetBundle',
        'frontend\assets\bower\StickyFooter',
    ];
}
