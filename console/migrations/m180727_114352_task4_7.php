<?php

use yii\db\Migration;

/**
 * Class m180727_114352_task4_7
 */
class m180727_114352_task4_7 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName = Yii::$app->db->tablePrefix . 'products';
        if (Yii::$app->db->getTableSchema($tableName, true) === null) {
            $this->createTable(
                'products', [
                'id' => $this->bigPrimaryKey(),
                'name' => $this->string()->notNull(),
                'product_handle' => $this->string()->unique(),
                'images' => $this->string(), //(text)
                'price' => $this->integer(),// (money)
                'inventory' => $this->integer(), //(int)
                'created_at' => $this->dateTime(),   // (datetime)
                'updated_at' => $this->timestamp(), //(timestamp)
                'status' => $this->boolean() //(boolean)

            ]);

        }
        else{
            echo 'table already exists';
        }
        if($abc=Yii::$app->db->getSchema()){
            echo $abc;
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180727_114352_task4_7 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180727_114352_task4_7 cannot be reverted.\n";

        return false;
    }
    */
}
