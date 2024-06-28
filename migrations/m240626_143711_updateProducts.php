<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m240626_143711_updateProducts
 */
class m240626_143711_updateProducts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            'products',
            'rating',
            $this->integer()->notNull()->defaultValue(1)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('products', 'rating');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240626_143711_updateProducts cannot be reverted.\n";

        return false;
    }
    */
}
