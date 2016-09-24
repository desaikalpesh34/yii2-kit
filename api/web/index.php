<?php
require(__DIR__ . '/../../vendor/autoload.php');

// Environment
require(__DIR__ . '/../../common/env.php');

require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
   // require(__DIR__ . '/../../common/config/main.php'),
   require(__DIR__ . '/../../common/config/base.php'),
   
    require(__DIR__ . '/../config/main.php')
    //require(__DIR__ . '/../config/main-local.php')
);
require(__DIR__ . '/../../api/config/bootstrap.php');
//echo __DIR__ . '/../../vendor/autoload.php'; die;


$application = new yii\web\Application($config);
$application->run();
