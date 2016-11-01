<?php

use yii\db\Migration;

class m161101_060655_user_history extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%user_history}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title' => $this->string(120)->notNull(),
            'description' => $this->text(),
            'level' => $this->smallInteger()->defaultValue(0),
            'class' => $this->string(60),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'data' => $this->text(),
            'created_at' => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey('user_history_to_user_fk', '{{%user_history}}', 'user_id', '{{%user}}', 'id', 'cascade', 'cascade');

    }

    public function safeDown()
    {
        $this->dropForeignKey('user_history_to_user_fk', '{{%user_history}}');
        $this->dropTable('{{%user_history}}');
    }
}
