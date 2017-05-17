<?php

namespace frontend\models;

use dektrium\user\models\Token as BaseToken;
use yii\helpers\Url;

/**
 * {@inheritDoc}
 */
class Token extends BaseToken
{
    public function getBaseUrl()
    {
        switch ($this->type) {
            case self::TYPE_CONFIRMATION:
                $route = '/user/registration/confirm';
                break;
            case self::TYPE_RECOVERY:
                $route = '/user/recovery/reset';
                break;
            case self::TYPE_CONFIRM_NEW_EMAIL:
            case self::TYPE_CONFIRM_OLD_EMAIL:
                $route = '/user/settings/confirm';
                break;
            default:
                throw new \RuntimeException();
        }

        return Url::to([$route, 'id' => $this->user_id], true);
    }
}