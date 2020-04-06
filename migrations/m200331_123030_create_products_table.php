<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m200331_123030_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
            'position'=>$this->integer(),
            'image'=>$this->string(),
            'description'=>$this->string(),
            'price'=>$this->integer(),
            'discount'=>$this->integer(),
            'percentage'=>$this->integer(),
            'category_id'=>$this->integer(),
            'is_delete'  => $this->integer()
                ->notNull()
                ->defaultValue(0),
            'created_at' => Schema::TYPE_TIMESTAMP . ' DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => Schema::TYPE_TIMESTAMP . ' DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->createIndex('idx-products-category_id','products','category_id');
        $this->addForeignKey('fk-products-category_id','products','category_id','categories','id','CASCADE');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-products-category_id','products');
        $this->dropIndex('idx-products-category_id','products');
        $this->dropTable('{{%products}}');
    }
}
