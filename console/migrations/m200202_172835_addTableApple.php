<?php

use yii\db\Migration;

/**
 * Class m200202_172835_addTableApple
 */
class m200202_172835_addTableApple extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("apple",[
            'id' => $this->primaryKey(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'status' => $this->integer(),
            'how_much_eat' => $this->decimal(3, 2),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('apple');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200202_172835_addTableApple cannot be reverted.\n";

        return false;
    }
    */
}
