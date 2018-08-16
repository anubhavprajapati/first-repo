<?php

use yii\db\Migration;

/**
 * Class m180727_105712_task4_3
 */
class m180727_105712_task4_3 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('product_varient','id',$this->bigInteger());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180727_105712_task4_3 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180727_105712_task4_3 cannot be reverted.\n";

        return false;
    }
    */
}
