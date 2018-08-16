<?php

use yii\db\Migration;

/**
 * Class m180727_091239_task4
 */
class m180727_091239_task4 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->alterColumn('product_varient','price',$this->money());
       }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      //


    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180727_091239_task4 cannot be reverted.\n";

        return false;
    }
    */
}
