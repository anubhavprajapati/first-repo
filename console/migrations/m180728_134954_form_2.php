<?php

use yii\db\Migration;

/**
 * Class m180728_134954_form_2
 */
class m180728_134954_form_2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('form','created_at',$this->integer()->notNull());
        $this->addColumn('form', 'updated_at',$this->integer()->notNull());
        $this->addColumn('form','status',$this->smallInteger()->notNull()->defaultValue(10));
        $this->addColumn('form','auth_key',$this->string(32)->notNull());
        $this->addColumn('form','password_reset_token',$this->string()->unique());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('form','status');
        $this->dropColumn('form','created_at');
        $this->dropColumn('form','updated_at');
        $this->dropColumn('form','auth_key');
        $this->dropColumn('form','password_reset_tokenIndex');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180728_134954_form_2 cannot be reverted.\n";

        return false;
    }
    */
}
