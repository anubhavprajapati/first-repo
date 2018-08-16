<?php

use yii\db\Migration;

/**
 * Class m180727_110429_task4_5
 */
class m180727_110429_task4_5 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropPrimaryKey('id','product_varient');
        $this->renameColumn('product_varient','inventory','inventories');
        $this->addColumn('product_varient','status', $this->boolean());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {


    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180727_110429_task4_5 cannot be reverted.\n";

        return false;
    }
    */
}
