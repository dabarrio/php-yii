<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m240626_142241_createTableProducts
 */
class m240626_142241_createTableProducts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240626_142241_createTableProducts cannot be reverted.\n";

        return false;
    }
    */
}
