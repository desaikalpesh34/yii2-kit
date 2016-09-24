<?php
/**
 * Require core files
 */
require_once(__DIR__ . '/../helpers.php');

/**
 * Setting path aliases
 */
Yii::setAlias('@base', realpath(__DIR__.'/../../'));
Yii::setAlias('@common', realpath(__DIR__.'/../../common'));
Yii::setAlias('@frontend', realpath(__DIR__.'/../../frontend'));
Yii::setAlias('@backend', realpath(__DIR__.'/../../backend'));
Yii::setAlias('@console', realpath(__DIR__.'/../../console'));
Yii::setAlias('@storage', realpath(__DIR__.'/../../storage'));
Yii::setAlias('@tests', realpath(__DIR__.'/../../tests'));
Yii::setAlias('@api', realpath(__DIR__.'/../../api'));

/**
 * Setting url aliases
 */
if (YII_ENV_DEV) 
{
	Yii::setAlias('@frontendUrl', env('LOCAL_FRONTEND_URL'));
	Yii::setAlias('@backendUrl', env('LOCAL_BACKEND_URL'));
	Yii::setAlias('@storageUrl', env('LOCAL_STORAGE_URL'));
}

if (YII_ENV_PROD) 
{
	Yii::setAlias('@frontendUrl', env('LIVE_FRONTEND_URL'));
	Yii::setAlias('@backendUrl', env('LIVE_BACKEND_URL'));
	Yii::setAlias('@storageUrl', env('LIVE_STORAGE_URL'));
}






