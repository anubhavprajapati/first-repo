<?php

use yii\db\Migration;

/**
 * Class m180727_103948_task4_2
 */
class m180727_103948_task4_2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName = Yii::$app->db->tablePrefix . 'product_varient';
        if (Yii::$app->db->getTableSchema($tableName, true) === null){
        $this->dropPrimaryKey('id','product_varient');
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180727_103948_task4_2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180727_103948_task4_2 cannot be reverted.\n";

        return false;
    }
    */
}
