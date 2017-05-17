<?php

namespace frontend\controllers;

use frontend\models\ContactForm;
use frontend\models\ContactUsForm;
use frontend\models\LoginForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * {@inheritDoc}
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error'   => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class'           => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    /**
     * Displays homepage.
     *
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function actionIndex()
    {


        $contactUsModel = new ContactUsForm();

        if ($contactUsModel->load(Yii::$app->request->post()) && $contactUsModel->contact('denis4yk19@gmail.com',
                $contactUsModel)
        ) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('index', ['contactUsModel' => $contactUsModel]);
    }


    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    /**
     * Displays our services page
     *
     * @return string
     */
    public function actionServices()
    {
        return $this->render('our-services');
    }


    /**
     * Displays our terms and conditions page
     *
     * @return string
     */
    public function actionTermsAndConditions()
    {
        return $this->render('terms-and-conditions');
    }

    /**
     * Displays our privacy policy page
     *
     * @return string
     */
    public function actionPrivacyPolicy()
    {
        return $this->render('privacy-policy');
    }


    /**
     * @param string $language
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function actionSetLanguage($language)
    {
        \Yii::$app->language = $language;
        $this->goBack(Url::home());
    }
}