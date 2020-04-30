<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%clients}}`.
 */
class m200430_173807_create_clients_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%clients}}', [
            'id' => $this->primaryKey(),
            'name'=> $this->string(),
            'surname'=>$this->string(),
            'address'=>$this->string(),
            'location'=>$this->string(),
            'region'=>$this->string(),
            'post'=>$this->string(),
            'phone'=>$this->string(),
            'email'=>$this->string(),
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
        $this->dropTable('{{%clients}}');
    }
}
