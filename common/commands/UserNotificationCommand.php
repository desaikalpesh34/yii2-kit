<?php

namespace common\commands;

use Yii;
use yii\base\BaseObject;
use common\models\UserNotification;
use trntv\bus\interfaces\SelfHandlingCommand;

class UserNotificationCommand extends BaseObject implements SelfHandlingCommand
{
    public $user_id;
    public $title;
    public $description;
    public $is_read;
    public $status;

    public function handle($command)
    {
        $model = new UserNotification();
        $model->user_id = $command->user_id;
        $model->title = $command->title;
        $model->description = $command->description;
        $model->is_read = $command->is_read;
        $model->status = $command->status;
        return $model->save(false);
    }
}
