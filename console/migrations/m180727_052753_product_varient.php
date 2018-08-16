<?php

use yii\db\Migration;
use yii\db\pgsql\Schema;
/**
 * Class m180727_052753_product_varient
 */
class m180727_052753_product_varient extends Migration
{
    /**
     * {@inheritdoc}
     * refresh true hoga to sirf database me check karega otherwise pehle cache me check karega ki table exists karte hai ya nahi
     */
    public function safeUp()
    {
        $tableName = Yii::$app->db->tablePrefix . 'product_varient';
        if (Yii::$app->db->getTableSchema($tableName, true) === null) {
            $this->createTable(
                'product_varient', [
                'id' => $this->bigPrimaryKey(),
                'name' => $this->string()->notNull(),
                'product_id' => $this->bigInteger()->notNull(),
                'images' => $this->string(), //(text)
                'price' => $this->integer(),// (money)
                'inventory' => $this->integer(), //(int)
                'created_at' => $this->dateTime(),   // (datetime)
                'updated_at' => $this->timestamp(), //(timestamp)
                'status' => $this->boolean(), //(boolean)
              //  'id2' => Schema::TYPE_BIGINT, Schema::TYPE_PK, Schema::

            ]);
            $this->addForeignKey(
                'product_id',
                'product_varient',
                'product_id',
                'products',
                'id'
            );
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
       // echo "m180727_052753_product_varient cannot be reverted.\n";
/*
        $this->dropColumn('product_varient',
            'status');*/
   //     $this->alterColumn('{{%product_varient}}', 'id', $this->bigInteger().' NOT NULL AUTO_INCREMENT');
   //     $this->dropColumn('product_varient','updated_at');
     //   $this->alterColumn('product_varient','name',$this->primaryKey());
//        $this->dropPrimaryKey('id','product_varient');

       /* return false;*/
    }

    /*

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180727_052753_product_varient cannot be reverted.\n";

        return false;
    }
    */

}
