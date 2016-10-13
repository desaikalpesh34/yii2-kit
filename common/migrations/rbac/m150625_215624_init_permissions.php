<?php

use yii\db\Schema;
use common\rbac\Migration;

class m150625_215624_init_permissions extends Migration
{
    public function up()
    {
        //get all role
        $sub_admin = $this->auth->getRole(\common\models\User::ROLE_SUB_ADMIN);

        $user = $this->auth->getRole(\common\models\User::ROLE_USER);
        $vendor = $this->auth->getRole(\common\models\User::ROLE_VENDOR);

        $admin = $this->auth->getRole(\common\models\User::ROLE_ADMINISTRATOR);

        //define and assign  permission 
        $loginToBackend = $this->auth->createPermission('loginToBackend');
        $this->auth->add($loginToBackend);
        $this->auth->addChild($sub_admin, $loginToBackend);
        $this->auth->addChild($admin, $loginToBackend);


        
        //manage user permission
        $user_permission = $this->auth->createPermission('userPermission');
         $this->auth->add($user_permission);
         $this->auth->addChild($user, $user_permission);
        
        //manage vendor Permission
        $vendor_permission = $this->auth->createPermission('vendorPermission');
        $this->auth->add($vendor_permission);
        $this->auth->addChild($vendor, $vendor_permission);

        //manage admin permission
        $admin_permission = $this->auth->createPermission('adminPermission');
        $this->auth->add($admin_permission);
        $this->auth->addChild($admin, $admin_permission);

         //user settings and default permission
        $user_default_permission = $this->auth->createPermission('/user/*');
        $this->auth->add($user_default_permission);
        $this->auth->addChild($user_permission, $user_default_permission);
        $this->auth->addChild($vendor_permission, $user_default_permission);

        //manage sub-admin permission
        $alladminpemissin = $this->auth->createPermission('/*');
        $this->auth->add($alladminpemissin);
        $this->auth->addChild($admin_permission, $alladminpemissin);

        $sub_admin_permission = $this->auth->createPermission('subAdminPermission');
        $this->auth->add($sub_admin_permission);
        $this->auth->addChild($sub_admin, $sub_admin_permission);
       
        //manage page
        $pagePermission = $this->auth->createPermission('/page/*');
        $this->auth->add($pagePermission);
        $this->auth->addChild($sub_admin_permission, $pagePermission);
        
        //see dashboard
        $timeLinePermission = $this->auth->createPermission('/timeline-event/index');
        $this->auth->add($timeLinePermission);
        $this->auth->addChild($sub_admin_permission, $timeLinePermission); 

        //manage article
        $articlePermission = $this->auth->createPermission('/article/*');
        $this->auth->add($articlePermission);
        $this->auth->addChild($sub_admin_permission, $articlePermission); 

        //manage article category
        $articleCategoryPermission = $this->auth->createPermission('/article-category/*');
        $this->auth->add($articleCategoryPermission);
        $this->auth->addChild($sub_admin_permission, $articleCategoryPermission); 

        //manage own account
        $accountPermission = $this->auth->createPermission('/sign-in/*');
        $this->auth->add($accountPermission);
        $this->auth->addChild($sub_admin_permission, $accountPermission);

        //manage i18n message translation
        $messagePermission = $this->auth->createPermission('/i18n/*');
        $this->auth->add($messagePermission);
        $this->auth->addChild($sub_admin_permission, $messagePermission);

        //manage Cache
        $cachePermission = $this->auth->createPermission('/cache/*');
        $this->auth->add($cachePermission);
        $this->auth->addChild($sub_admin_permission, $cachePermission);

        //view system-information 
        $systemViewPermission = $this->auth->createPermission('/system-information/*');
        $this->auth->add($systemViewPermission);
        $this->auth->addChild($sub_admin_permission, $systemViewPermission);

         //manage Log
        $logPermission = $this->auth->createPermission('/log/*');
        $this->auth->add($logPermission);
        $this->auth->addChild($sub_admin_permission, $logPermission);
    }

    public function down()
    {
        $this->auth->remove($this->auth->getPermission('loginToBackend'));
        $this->auth->remove($this->auth->getPermission('adminPermission'));
        $this->auth->remove($this->auth->getPermission('subAdminPermission'));
        $this->auth->remove($this->auth->getPermission('/*'));
        $this->auth->remove($this->auth->getPermission('page/*'));
        $this->auth->remove($this->auth->getPermission('/timeline-event/index'));
        $this->auth->remove($this->auth->getPermission('/article/*'));
        $this->auth->remove($this->auth->getPermission('article-category/*'));
        $this->auth->remove($this->auth->getPermission('/sign-in/*'));
        $this->auth->remove($this->auth->getPermission('/i18n/*'));
        $this->auth->remove($this->auth->getPermission('/cache/*'));
        $this->auth->remove($this->auth->getPermission('/system-information/*'));
        $this->auth->remove($this->auth->getPermission('/log/*'));
    }
}
