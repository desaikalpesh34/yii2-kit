<?php

namespace frontend\controllers\user;

use frontend\models\Person;
use frontend\models\Profile;
use dektrium\user\controllers\SettingsController as BaseSettingsController;
use dektrium\user\helpers\Password;
use Yii;
use yii\base\DynamicModel;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * {@inheritDoc}
 */
class SettingsController extends BaseSettingsController
{
    public $layout = 'user-panel';


    /**
     * {@inheritDoc}
     */
    public function beforeAction($action)
    {
        $this->view->registerJs("$('form').areYouSure({'silent': true});
$('.sidebar a').each(function (index) {
    $(this).on('click', function (event) {
        if ($('.dirty').length > 0) {
            var link = event.currentTarget.getAttribute(\"href\");
            event.preventDefault();
            $('#leaveModal').modal('show');
            $('#leaveModal #leave-without-saving').attr('href', link)
            $('#leaveModal #save-and-leave').on('click', function() {
              $('form').append(\"<input type='hidden' name='link' value='\"+ link +\"' />\");
              $('#are-you-leaving-modal').click();
            })
        }
    });
})
");

        if ( ! Yii::$app->user->isGuest) {
            //pass user mail to layout
            $userId                          = Yii::$app->user->identity->getId();
            $this->view->params['user'] = $this->finder->findUserById($userId);
            $this->view->params['userEmail'] = $this->view->params['user']->email;

            //user reset password form
            $passwordResetForm = new DynamicModel(['oldPassword', 'newPassword', 'newPasswordConfirm']);
            $passwordResetForm->addRule(['oldPassword', 'newPassword', 'newPasswordConfirm'], 'string', ['max' => 128]);
            $passwordResetForm->addRule(['oldPassword', 'newPassword', 'newPasswordConfirm'], 'required');
            $passwordResetForm->addRule(['newPassword'], 'compare', ['compareAttribute' => 'newPasswordConfirm']);

            $this->view->params['passwordResetForm'] = $passwordResetForm;
        }

        return parent::beforeAction($action);
    }


    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return [
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'disconnect' => ['post'],
                    'delete'     => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow'   => true,
                        'actions' => [
                            'profile',
                            'account',
                            'status',
                            'personal',
                            'spouse',
                            'children',
                            'country',
                            'education',
                            'photographs',
                            'networks',
                            'disconnect',
                            'delete',
                            'delete-avatar',
                            'reset-password',
                        ],
                        'roles'   => ['@'],
                    ],
                    [
                        'allow'   => true,
                        'actions' => ['confirm'],
                        'roles'   => ['?', '@'],
                    ],
                ],
            ],
        ];
    }


    public function actionStatus()
    {
        $paymentPlan = Yii::$app->user->identity->paymentPlan;
        /** @var Profile $profile */
        $profile = Yii::$app->user->identity->profile;

        $isStatusComplete = true;
        foreach ($profile->getFilledPages() as $page) {
            if ( ! $page) {
                $isStatusComplete = false;
            }
        }

        return $this->render('status',
            ['paymentPlan' => $paymentPlan, 'profile' => $profile, 'isStatusComplete' => $isStatusComplete]);
    }


    public function actionPersonal()
    {
        /**
         * @var Profile $model
         */
        $model = Yii::$app->user->identity->profile;

        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();

            $model->load($post);

            $country    = $post['Profile']['current_country'];
            $countryFoo = $post['Profile']['country-foo'];

            $mailingCountry    = $post['Profile']['mailing_country'];
            $mailingCountryFoo = $post['Profile']['mailing-country-foo'];

            if (strlen($countryFoo) != 0 && $country != $countryFoo) {
                $model->current_country = $post['Profile']['country-foo'];
            }

            if (strlen($mailingCountryFoo) != 0 && $mailingCountry != $mailingCountryFoo) {
                $model->mailing_country = $post['Profile']['mailing-country-foo'];
            }

            if ($model->validate()) {
                $model->save();
                \Yii::$app->session->setFlash('info',
                    'Your input and progress have been properly saved. You may now exit the application.');
                if (isset($_POST['continue'])) {
                    return $this->redirect(Url::to('spouse'));
                }
                if (isset($_POST['link'])) {
                    return $this->redirect($_POST['link']);
                }
            }
        }

        return $this->render('personal', ['model' => $model]);
    }


    public function actionSpouse()
    {
        /**
         * @var Profile $profile
         */
        $profile = Yii::$app->user->identity->profile;
        /**
         * @var array $spouses
         */
        $spouses = $profile->spouses;

        if ( ! count($spouses)) {
            $spouse = new Person();
            $spouse->setRelation(Person::SPOUSE);
            $profile->link('spouses', $spouse);
        } else {
            $spouse = $spouses[0];
        }

        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();

            $profile->load(Yii::$app->request->post());
            $spouse->load(Yii::$app->request->post());

            $country    = $post['Person']['country_of_birth'];
            $countryFoo = $post['Person']['country-foo'];

            if (strlen($countryFoo) != 0 && $country != $countryFoo) {
                $spouse->country_of_birth = $post['Person']['country-foo'];
            }

            if ($profile->validate() && $spouse->validate()) {
                $profile->save();
                $spouse->save();
                \Yii::$app->session->setFlash('info',
                    'Your input and progress have been properly saved. You may now exit the application.');
                if (isset($_POST['continue'])) {
                    return $this->redirect(Url::to('children'));
                }
                if (isset($_POST['link'])) {
                    return $this->redirect($_POST['link']);
                }
            }
        }

        return $this->render('spouse', ['profile' => $profile, 'spouse' => $spouse]);
    }


    public function actionChildren()
    {
        /**
         * @var Profile $profile
         */
        $profile = Yii::$app->user->identity->profile;

        if (Yii::$app->request->isPost) {
            $profile->load(Yii::$app->request->post());
            if ($profile->validate()) {
                $profile->save();
            }
        }

        $childrenNumber = Yii::$app->request->get('childrenNumber');
        if (is_null($childrenNumber)) {
            $childrenNumber = 1;
        }

        $children = [];
        if ($childrenNumber > count($profile->children)) {
            for ($i = count($profile->children); $i < $childrenNumber; $i++) {
                $child = new Person();
                $child->setRelation(Person::CHILD);
                $profile->link('children', $child);
            }
            $children = $profile->children;
        } elseif ($childrenNumber < count($profile->children)) {
            $childrenToUnlink = array_slice($profile->children, -(count($profile->children) - $childrenNumber));
            /** @var Person $child */
            foreach ($childrenToUnlink as $child) {
                $profile->unlink('children', $child, true);
            }
            $children = $profile->children;
        } else {
            $children = $profile->children;
        }

        if (Yii::$app->request->isPost) {
            Person::loadMultiple($children, Yii::$app->request->post());
            if (Person::validateMultiple($children)) {
                foreach ($children as $child) {
                    $child->save();
                }
                \Yii::$app->session->setFlash('info',
                    'Your input and progress have been properly saved. You may now exit the application.');
                if (isset($_POST['continue'])) {
                    return $this->redirect(Url::to('country'));
                }
                if (isset($_POST['link'])) {
                    return $this->redirect($_POST['link']);
                }
            }
        }

        return $this->render('children', [
            'profile'        => $profile,
            'childrenNumber' => $childrenNumber,
            'children'       => $children,
        ]);
    }


    public function actionCountry()
    {
        /** @var Profile $model */
        $model = Yii::$app->user->identity->profile;

        $hasSpouseScript = $model->hasSpouse() ? '' : "
                $('.parents, .father-born').removeClass('inactive');
                $('.mar-block').fadeOut();
                $('.city, .countr').hide();";
        $script          = "
            $('.cant-find-user').on('click', function () {
                $('.mar-block').removeClass('inactive');
                $('.yourcountry').fadeOut();
                $('.city, .countr').hide();
            
                $hasSpouseScript
                
            });";

        $this->view->registerJs($script);

        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();

            $model->country_of_birth = $post['your_country'];
            if ( ! empty($post['cofb'])) {
                $model->country_of_birth = $post['cofb'];
            }
            if ( ! empty($post['cityof']) && $post['cityof'] != $model->city_born_in) {
                $model->city_born_in = $post['cityof'];
            } else {
                $model->city_born_in = $post['ciofb'];
            }
            $model->spouse_country_of_birth = $post['spouse_country'];
            $model->father_country_of_birth = $post['father_country'];
            $model->mother_country_of_birth = $post['mother_country'];

            if (isset($_POST['reset'])) {
                $model->country_of_birth        = null;
                $model->city_born_in            = null;
                $model->spouse_country_of_birth = null;
                $model->father_country_of_birth = null;
                $model->mother_country_of_birth = null;

                $model->save();
            } elseif ($model->validate()) {
                $model->save();
                Yii::$app->session->setFlash('info',
                    'Your input and progress have been properly saved. You may now exit the application.');
                if (isset($_POST['continue'])) {
                    return $this->redirect(Url::to('education'));
                }
                if (isset($_POST['link'])) {
                    return $this->redirect($_POST['link']);
                }
            }
        }

        return $this->render('country', ['model' => $model]);
    }


    public function actionEducation()
    {
        /** @var Profile $model */
        $model = Yii::$app->user->identity->profile;

        $model->load(Yii::$app->request->post());

        if (Yii::$app->request->isPost && $model->validate()) {
            $model->save();
            \Yii::$app->session->setFlash('info',
                'Your input and progress have been properly saved. You may now exit the application.');
            if (isset($_POST['continue'])) {
                return $this->redirect(Url::to('photographs'));
            }
            if (isset($_POST['link'])) {
                return $this->redirect($_POST['link']);
            }
        }

        return $this->render('education', ['model' => $model]);
    }


    public function actionPhotographss()
    {
        /**
         * @var Profile $model
         * @var Person  $spouse
         * @var array   $children
         */
        $post = Yii::$app->request->post();

        $model = Yii::$app->user->identity->profile;
        $model->load($post);

        $spouse = null;
        if ($model->hasSpouse()) {
            $spouse->load($post);
        }

        $children = $model->children;

        if (Yii::$app->request->isPost) {
            if ($model->hasSpouse()) {
                $spouse             = $model->spouses[0];
                $spouse->avatar_url = \yii\web\UploadedFile::getInstance($spouse, 'avatar_url');
                $spouse->upload();
            }

            $children = $model->children;
            Person::loadMultiple($children, Yii::$app->request->post());

            $model->save();
            $spouse->save();
            foreach ($children as $child) {
                $child->save();
            }

            if (isset($_POST['continue'])) {
                return $this->redirect(Url::to('status'));
            }
            if (isset($_POST['link'])) {
                return $this->redirect($_POST['link']);
            }
        }

        return $this->render('photographs', ['model' => $model, 'spouse' => $spouse, 'children' => $children]);
    }


    public function actionPhotographs()
    {
        /**
         * @var Profile $profile
         * @var Person  $spouse
         * @var array   $children
         */
        $profile = Yii::$app->user->identity->profile;

        $spouse = null;
        if ($profile->hasSpouse()) {
            $spouse = $profile->spouses[0];
        }

        $children = $profile->children;

        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();

            if ($profile->validate()) {
                $profile->load($post);
                $profile->save();
            }

            if ($profile->hasSpouse()) {
                $spouse->photo = UploadedFile::getInstance($spouse, 'photo');
                if ( ! empty($spouse->photo)) {
                    $spouse->upload();
                    $spouse->save();
                }
            }

            /** @var Person $child */
            foreach ($children as $i => $child) {
                $childPhoto = UploadedFile::getInstanceByName('child_' . $i);
                if ( ! empty($childPhoto)) {
                    $child->photo = $childPhoto;
                    $child->upload();
                    $child->save();
                }
            }
        }

        return $this->render('photographs', ['model' => $profile, 'spouse' => $spouse, 'children' => $children]);
    }


    public function actionDeleteAvatar($id, $whom)
    {
        if ( ! Yii::$app->request->isPost || (int)$id !== Yii::$app->user->id) {
            return $this->redirect(Yii::$app->request->referrer);
        }

        /** @var Profile $profile */
        $profile = Yii::$app->user->identity->profile;

        switch ($whom) {
            case 'user':
                $profile->avatar_url = null;
                $profile->save();
                break;
            case 'spouse':
                /** @var Person $spouse */
                $spouse             = $profile->spouses[0];
                $spouse->avatar_url = null;
                $spouse->save();
                break;
            case 'child':
                $children = $profile->children;

                /** @var Person $child */
                foreach ($children as $child) {
                    if ($child->id === (int)Yii::$app->request->get('child-id')) {
                        $child->avatar_url = null;
                        $child->save();
                    }
                }

                break;
        }

        return $this->redirect(Yii::$app->request->referrer);
    }


    public function actionResetPassword()
    {
        $passwordResetForm = $this->view->params['passwordResetForm'];
        $passwordResetForm->load(Yii::$app->request->post());

        if (Yii::$app->request->isPost && $passwordResetForm->validate()) {
            /** @var Profile $user */
            $user = $this->view->params['user'];

            if (Password::validate($passwordResetForm->oldPassword, $user->password_hash)) {
                $user->resetPassword($passwordResetForm->newPassword);
                $user->save();
                \Yii::$app->getSession()
                          ->setFlash('success', \Yii::t('user', 'Your password have been successfully updated'));

            }
        }

        return $this->goBack();
    }


    /**
     * {@inheritDoc}
     */
    public function actionProfile()
    {
        parent::actionProfile();
    }
}