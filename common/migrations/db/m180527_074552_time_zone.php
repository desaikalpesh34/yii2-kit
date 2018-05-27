<?php

use yii\db\Migration;

/**
 * Class m180527_074552_time_zone
 */
class m180527_074552_time_zone extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%time_zone}}', [
            'id' => $this->primaryKey(),
            'country_code' => $this->string(2)->notNull(),
            'zone_name' => $this->string(35)->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m180527_074552_time_zone cannot be reverted.\n";
        $this->dropTable('{{%time_zone}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180527_074552_time_zone cannot be reverted.\n";

        return false;
    }
    */
}
