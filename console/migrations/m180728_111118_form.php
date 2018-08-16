<?php

use yii\db\Migration;

/**
 * Class m180728_111118_form
 */
class m180728_111118_form extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      /*  $tableName = Yii::$app->db->tablePrefix . 'form';
        if (Yii::$app->db->getTableSchema($tableName, true) === null) {
            $this->createTable(
                'form', [
                'id' => $this->bigPrimaryKey()->notNull(),
                'name' => $this->string()->notNull(),
                'email' => $this->string()->unique(),
                'images' => $this->string(), //(text)
                'phone' => $this->integer(),// (money)
                'dob' => $this->integer(), //(int)
                'password' => $this->string(),   // (datetime)

            ]);
        }
        else{
            echo 'table already exists';
        }*/

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->renameColumn('form','images','image');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180728_111118_form cannot be reverted.\n";

        return false;
    }
    */
}
