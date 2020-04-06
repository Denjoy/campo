<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%banners}}`.
 */
class m200331_122920_create_banners_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%banners}}', [
            'id' => $this->primaryKey(),
            'position'=>$this->integer(),
            'image'=>$this->string(),
            'link'=>$this->string(),
            'is_delete'  => $this->integer()
                ->notNull()
                ->defaultValue(0),
            'created_at' => Schema::TYPE_TIMESTAMP . ' DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => Schema::TYPE_TIMESTAMP . ' DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%banners}}');
    }
}
