<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m180918_095658_create_post_table extends Migration
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
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'post_id' => $this->string(),
            'title'   => $this->string(),
            'page_id' => $this->integer(), 
            'image'   => $this->string(),
            'describe'=> $this->string(),
            'content' => $this->text(),
            'user_id' => $this->integer(),

        ],$tableOptions);
        $this->addForeignKey( 'fk_post_user', 'post', 'user_id', 'user', 'id', 'CASCADE' );
        $this->addForeignKey( 'fk_post_page', 'post', 'page_id', 'page', 'id', 'CASCADE' );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('post');
    }
}
