<?php

use yii\db\Migration;

/**
 * Class m180727_115950_task4_8
 */
class m180727_115950_task4_8 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      //  $this->dropForeignKey('product_id','productVarient');
      //  $this->alterColumn('products','id',$this->bigInteger());
      // $this->dropPrimaryKey('id','products');
      //  $this->addPrimaryKey('id',
      //      'products','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addForeignKey('product_id','productVarient','product_id','products','id');


    }

}
