<?php

use yii\db\cubrid\Schema;
use yii\db\Migration;

/**
 * Class m240626_142454_createTableProducts
 */
class m240626_142454_createTableProducts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'price' => Schema::TYPE_DOUBLE . ' NOT NULL',
            'description' => Schema::TYPE_TEXT . ' NOT NULL', // text NOT NULL
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('products');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240626_142454_createTableProducts cannot be reverted.\n";

        return false;
    }
    */
}
