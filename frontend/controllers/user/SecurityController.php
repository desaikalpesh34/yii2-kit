<?php

namespace frontend\controllers\user;

use frontend\models\Profile;
use dektrium\user\controllers\SecurityController as BaseSecurityController;
use dektrium\user\models\LoginForm;
use Yii;

/**
 * {@inheritDoc}
 */
class SecurityController extends BaseSecurityController
{
    public $layout = 'user';


    /**
     * {@inheritDoc}
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            $this->goHome();
        }

        /** @var LoginForm $model */
        $model = \Yii::createObject(LoginForm::className());
        $event = $this->getFormEvent($model);

        $this->performAjaxValidation($model);
        $this->trigger(self::EVENT_BEFORE_LOGIN, $event);

        if ($model->load(\Yii::$app->getRequest()->post()) && $model->login()) {
            $this->trigger(self::EVENT_AFTER_LOGIN, $event);
            if (Yii::$app->user->identity->isAdmin) {
                return $this->redirect('/user/admin');
            }

            return $this->redirect('/user/settings/status');
        }

        return $this->render('login', [
            'model'  => $model,
            'module' => $this->module,
        ]);
    }

}