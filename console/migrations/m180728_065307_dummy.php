<?php

use yii\db\Migration;

/**
 * Class m180728_065307_dummy
 */
class m180728_065307_dummy extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {/*
        $this->createTable('dummy',[
            'username'=>$this->string()->notNull()->unique(),
            'email'=>$this->string()->notNull(),
            'password'=>$this->string()->notNull()

        ]);*/
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('form','name','username');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180728_065307_dummy cannot be reverted.\n";

        return false;
    }
    */
}
