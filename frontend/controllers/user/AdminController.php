<?php
namespace app\controllers\user;

use frontend\models\User;
use dektrium\user\controllers\AdminController as BaseAdminContorller;
use PhpMimeMailParser\Parser;
use Yii;

/**
 * {@inheritDoc}
 */
class AdminController extends BaseAdminContorller
{

    public $layout = 'user.php';

    const EMAIL_TYPE_REGISTRATION_EMAIL = 'registration_email';

    const EMAIL_TYPE_RE_REGISTER_EMAIL = 're_register_email';

    const EMAIL_TYPE_CONGRATULATIONS_EMAIL = 'congratulations_email';

    /**
     * Shows information about user spouse.
     *
     * @param int $id
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionSpouse($id)
    {
        $user   = $this->findModel($id);
        $spouse = null;

        if (isset($user->profile->spouses[0])) {
            $spouse = $user->profile->spouses[0];
        }

        return $this->render('_spouse', [
            'user'   => $user,
            'spouse' => $spouse,
        ]);
    }


    /**
     * Shows information about user children.
     *
     * @param int $id
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionChildren($id)
    {

        /** @var User $user */
        $user = $this->findModel($id);

        $spouse = $user->profile->children;

        return $this->render('_children', [
            'user'   => $user,
            'spouse' => $spouse,
        ]);
    }


    public function actionShowEmail($id, $typeOfEmail)
    {
        $user = $this->finder->findUserById((int)$id);

        $parser = new Parser();
        $parser->setText($this->getEmail($user, $typeOfEmail));

        $emailHtml = $parser->getMessageBody('html');

        return $this->render('email',
            ['emailHtml' => $emailHtml, 'userId' => $id, 'typeOfEmail' => self::EMAIL_TYPE_REGISTRATION_EMAIL]);
    }


    public function actionResendEmail($userId, $typeOfEmail)
    {
        $user = $this->finder->findUserById((int)$userId);

        $parser = new Parser();
        $parser->setText($this->getEmail($user, $typeOfEmail));

        $headers = $parser->getHeaders();

        $email = Yii::$app->mailer->compose()->setTo($headers['to'])->setSubject($headers['subject'])
                                  ->setFrom($headers['from'])->setHtmlBody($parser->getMessageBody('html'));

        if ($email->send()) {
            Yii::$app->session->setFlash('success', 'Email was sent.');
        } else {
            Yii::$app->session->setFlash('danger', 'Email was not sent.');
        }

        return $this->goBack();
    }


    public function getFinder()
    {
        return $this->finder;
    }


    private function getEmail($user, $typeOfEmail)
    {
        switch ($typeOfEmail) {
            case (self::EMAIL_TYPE_REGISTRATION_EMAIL):
                return $user->registration_email;
                break;
            case (self::EMAIL_TYPE_CONGRATULATIONS_EMAIL):
                return $user->congratulations_email;
                break;
            case (self::EMAIL_TYPE_RE_REGISTER_EMAIL):
                return $user->re_register_email;
                break;
        }

        return null;
    }
}