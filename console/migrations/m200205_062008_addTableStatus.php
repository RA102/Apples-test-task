<?php

use yii\db\Migration;

/**
 * Class m200205_062008_addTableStatus
 */
class m200205_062008_addTableStatus extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('status', [
           'id' => $this->primaryKey(),
           'name' => $this->string(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200205_062008_addTableStatus cannot be reverted.\n";

        return false;
    }
    */
}
