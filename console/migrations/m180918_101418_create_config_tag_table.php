<?php

use yii\db\Migration;

/**
 * Handles the creation of table `config_tag`.
 */
class m180918_101418_create_config_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $tableOptions = null;
        if ( $this->db->driverName === 'mysql' ) {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('config_tag', [
            'id' => $this->primaryKey(),
            'title' => $this->string(), 
            'color' => $this->string(),
            'user_id' => $this->integer(),
            'created_at' => $this->integer(),
        ], $tableOptions);
        $this->addForeignKey( 'fk_config_tag_user', 'config_tag', 'user_id', 'user', 'id', 'CASCADE' );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('config_tag');
    }
}
