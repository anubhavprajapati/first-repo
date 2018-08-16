<?php

use yii\db\Migration;

/**
 * Class m180727_111646_task4_6
 */
class m180727_111646_task4_6 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    //       $this->dropForeignKey('productVarient','product_id');
    //    $this->dropColumn('productVarient','id');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('productVarient','id',$this->bigInteger());
        $this->addPrimaryKey('id',
            'productVarient','id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180727_111646_task4_6 cannot be reverted.\n";

        return false;
    }
    */
}
