<?php

use yii\db\Migration;

/**
 * Class m180312_131824_adminuser
 */
class m180312_131824_adminuser extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
      $this->createTable('admin_user', [
            'id' => $this->primaryKey(),
            'login_id' => $this->string(50)->notNull(),
            'password' => $this->string(50)->notNull(),
            'access_level' => $this->string(1)->notNull(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180312_131824_adminuser cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180312_131824_adminuser cannot be reverted.\n";

        return false;
    }
    */
}
