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
            'color' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()->defaultValue(null),
            'status_id' => $this->integer()->defaultValue(0),
            'how_much_left' => $this->decimal(3, 2)->defaultValue(1),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('apple');
    }


    // Use up()/down() to run migration code without a transaction.
/*
    public function up()
    {
        $this->createTable("apple",[
            'id' => $this->primaryKey(),
            'color' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->integer(),
            'how_much_eat' => $this->decimal(3, 2),
        ]);

    }

    public function down()
    {
        $this->dropTable('apple');
    }
*/

}
