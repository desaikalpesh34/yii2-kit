<?php

use yii\db\Migration;

class m161101_062505_user_notification extends Migration
{
    public function safeUp()
    {
      $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%user_notification}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title' => $this->string(120)->notNull(),
            'description' => $this->text(),
            'is_read' => $this->smallInteger()->notNull()->defaultValue(0),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey('user_notification_to_user_fk', '{{%user_notification}}', 'user_id', '{{%user}}', 'id', 'cascade', 'cascade');
    }

    public function safeDown()
    {
       $this->dropForeignKey('user_notification_to_user_fk', '{{%user_notification}}');
        $this->dropTable('{{%user_notification}}');
    }

}
