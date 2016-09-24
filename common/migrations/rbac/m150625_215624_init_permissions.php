<?php

use yii\db\Schema;
use common\rbac\Migration;

class m150625_215624_init_permissions extends Migration
{
    public function up()
    {
        $sub_admin = $this->auth->getRole(\common\models\User::ROLE_SUB_ADMIN);

        $admin = $this->auth->getRole(\common\models\User::ROLE_ADMINISTRATOR);

        $loginToBackend = $this->auth->createPermission('loginToBackend');
        $this->auth->add($loginToBackend);
        $this->auth->addChild($sub_admin, $loginToBackend);
        $this->auth->addChild($admin, $loginToBackend);

        $admin_permission = $this->auth->createPermission('adminPermission');
        $this->auth->add($admin_permission);
        $this->auth->addChild($admin, $admin_permission);

        $alladminpemissin = $this->auth->createPermission('/*');
        $this->auth->add($admin_permission);
        $this->auth->addChild($admin_permission, $alladminpemissin);

        $sub_admin_permission = $this->auth->createPermission('subAdminPermission');
        $this->auth->add($sub_admin_permission);
        $this->auth->addChild($sub_admin, $sub_admin_permission);

        $pagePermission = $this->auth->createPermission('page/*');
        $this->auth->add($pagePermission);
        $this->auth->addChild($sub_admin, $pagePermission);
    }

    public function down()
    {
        $this->auth->remove($this->auth->getPermission('loginToBackend'));
        $this->auth->remove($this->auth->getPermission('adminPermission'));
        $this->auth->remove($this->auth->getPermission('subAdminPermission'));
        $this->auth->remove($this->auth->getPermission('/*'));
        $this->auth->remove($this->auth->getPermission('page/*'));
    }
}
