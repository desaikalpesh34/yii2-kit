<?php
namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * {@inheritDoc}
 */
class UserAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'user/css/semantic.css',
        'user/css/register.css',
        'user/css/awesome-bootstrap-checkbox.css',
        'user/css/login.css',
        //custom styles, provided by backend developer
        'css/site.css',
        'css/site-media.css',
    ];

    public $js = [
        'user/js/semantic.min.js',
        'user/js/register.js',
        'js/counter.js',
        //'user/js/login.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'bootui\asset\CoreCss',
        'bootui\asset\CoreJs',
        'bootui\asset\CoreJsMin',
        'kartik\icons\FlagIconAsset',
        'rmrevin\yii\fontawesome\AssetBundle'
    ];
}
