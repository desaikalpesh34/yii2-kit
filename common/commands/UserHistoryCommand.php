<?php

namespace common\commands;

use Yii;
use yii\base\BaseObject;
use common\models\UserHistory;
use trntv\bus\interfaces\SelfHandlingCommand;

class UserHistoryCommand extends BaseObject implements SelfHandlingCommand
{
    public $user_id;
    public $title;
    public $description;
    public $level; //basic=0 normal=1 //advance=2 
    public $class;
    public $status;
    public $data;

    public function handle($command)
    {
        $model = new UserHistory();
        $model->user_id = $command->user_id;
        $model->title = $command->title;
        $model->description = $command->description;
        $model->level = $command->level;
        $model->class = $command->class;
        $model->status = $command->status;
        $model->data = json_encode($command->data, JSON_UNESCAPED_UNICODE);
        return $model->save(false);
    }
}
