<?php

use yii\db\Migration;

/**
 * Class m180727_052742_products
 */
class m180727_052742_products extends Migration
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
                'id' => $this->bigPrimaryKey()->notNull()->autoIncrement(flase),
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

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
  //      $this->alterColumn('{{%products}}', 'id', $this->bigInteger().' NOT NULL AUTO_INCREMENT');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180727_052742_products cannot be reverted.\n";

        return false;
    }
    */
}
