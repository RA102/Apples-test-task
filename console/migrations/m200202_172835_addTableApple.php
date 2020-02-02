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
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200202_172835_addTableApple cannot be reverted.\n";

        return false;
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
