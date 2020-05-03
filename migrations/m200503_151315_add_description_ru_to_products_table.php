<?php

use yii\db\Migration;

/**
 * Class m200503_151315_add_description_ru_to_products_table
 */
class m200503_151315_add_description_ru_to_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%products}}', 'description_rus', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%products}}', 'description_rus');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200503_151315_add_description_ru_to_products_table cannot be reverted.\n";

        return false;
    }
    */
}
