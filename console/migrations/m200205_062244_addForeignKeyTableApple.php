<?php

use yii\db\Migration;

/**
 * Class m200205_062244_addForeignKeyTableApple
 */
class m200205_062244_addForeignKeyTableApple extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('apple_status_id_fk', 'apple', 'status_id', 'status', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('status_id', 'apple');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200205_062244_addForeignKeyTableApple cannot be reverted.\n";

        return false;
    }
    */
}
