<?php

use common\rbac\Migration;
use common\rbac\rule\SelfUpdate;

class m151223_074604_self_update_rule extends Migration
{
    public function up()
    {
        $rule = new SelfUpdate();
        $this->auth->add($rule);
        $sub_admin = $this->auth->getRole(\common\models\User::ROLE_SUB_ADMIN);
        $admin = $this->auth->getRole(\common\models\User::ROLE_ADMINISTRATOR);
        $vendor = $this->auth->getRole(\common\models\User::ROLE_VENDOR);
        $user = $this->auth->getRole(\common\models\User::ROLE_USER);

        $editselfUpdatePermission = $this->auth->createPermission('editSelfUpdate');
        $editselfUpdatePermission->ruleName = $rule->name;

        $this->auth->add($editselfUpdatePermission);
        $this->auth->addChild($sub_admin, $editselfUpdatePermission);
        //$this->auth->addChild($vendor, $editselfUpdatePermission);
        //$this->auth->addChild($admin, $editselfUpdatePermission);
        $this->auth->addChild($user, $editselfUpdatePermission);
    }

    public function down()
    {
        $permission = $this->auth->getPermission('editOwnModel');
        $rule = $this->auth->getRule('ownModelRule');

        $this->auth->remove($permission);
        $this->auth->remove($rule);
    }
}
