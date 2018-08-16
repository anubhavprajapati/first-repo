<?php

use yii\db\Migration;

/**
 * Class m180727_123914_task4_9
 */
class m180727_123914_task4_9 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'index-product_id',
            'productVarient',
            'product_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180727_123914_task4_9 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180727_123914_task4_9 cannot be reverted.\n";

        return false;
    }
    */
}
