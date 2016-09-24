<?php
namespace api\modules\v1\controllers;

use Yii;
use yii\rest\Controller;

class HelloController extends Controller
{
    public function actionIndex()
    {
        return 'Hello Api';
    }
}
