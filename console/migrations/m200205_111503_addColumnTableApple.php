<?php

use yii\db\Migration;

/**
 * Class m200205_111503_addColumnTableApple
 */
class m200205_111503_addColumnTableApple extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('apple', 'point_no_return', 'integer');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('apple', 'point_no_return');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200205_111503_addColumnTableApple cannot be reverted.\n";

        return false;
    }
    */
}
