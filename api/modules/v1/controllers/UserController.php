<?php

namespace api\modules\v1\controllers;

use common\models\User;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use api\modules\v1\models\search\UserSearch;
use Yii;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class UserController extends Controller
{
    /**
     * @var string
     */
    //public $modelClass = 'frontend\modules\api\v1\resources\User';

    /**
     * @return array
     */
    /*public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                [
                    'class' => HttpBasicAuth::className(),
                    'auth' => function ($username, $password) {
                        $user = User::findByLogin($username);
                        return $user->validatePassword($password)
                            ? $user
                            : null;
                    }
                ],
                HttpBearerAuth::className(),
                QueryParamAuth::className()
            ]
        ];

        return $behaviors;
    }*/

    /**
     * @inheritdoc
     */
    

    /**
     * @param $id
     * @return null|static
     * @throws NotFoundHttpException
     */

    public function actionIndex()
    {
        $searchModel = new UserSearch();
        return $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    }

    public function findModel($id)
    {
        $model = User::findOne($id);
        if (!$model) 
        {
            throw new NotFoundHttpException;
        }
        return $model;
    }
}
