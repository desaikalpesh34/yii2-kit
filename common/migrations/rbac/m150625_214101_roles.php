<?php

use common\rbac\Migration;
use common\models\User;

class m150625_214101_roles extends Migration
{
    public function up()
    {
        $this->auth->removeAll();

        $user = $this->auth->createRole(User::ROLE_USER);
        $this->auth->add($user);

        $sub_admin = $this->auth->createRole(User::ROLE_SUB_ADMIN);
        $this->auth->add($sub_admin);

        $vendor = $this->auth->createRole(User::ROLE_VENDOR);
        $this->auth->add($vendor);

        $admin = $this->auth->createRole(User::ROLE_ADMINISTRATOR);
        $this->auth->add($admin);

        $this->auth->assign($admin, 1);
        $this->auth->assign($sub_admin, 2);
        $this->auth->assign($vendor, 3);
        $this->auth->assign($user, 4);
    }

    public function down()
    {
        $this->auth->remove($this->auth->getRole(User::ROLE_ADMINISTRATOR));
        //$this->auth->remove($this->auth->getRole(User::ROLE_MANAGER));
        $this->auth->remove($this->auth->getRole(User::ROLE_USER));
        $this->auth->remove($this->auth->getRole(User::ROLE_SUB_ADMIN));
        $this->auth->remove($this->auth->getRole(User::ROLE_VENDOR));
    }
}
