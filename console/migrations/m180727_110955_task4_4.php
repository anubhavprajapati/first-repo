<?php

use yii\db\Migration;

/**
 * Class m180727_110955_task4_4
 */
class m180727_110955_task4_4 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('productVarient','inventory',$this->integer()->unique());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
     //   $this->renameTable('product_varient', 'productVarient');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180727_110955_task4_4 cannot be reverted.\n";

        return false;
    }
    */
}
