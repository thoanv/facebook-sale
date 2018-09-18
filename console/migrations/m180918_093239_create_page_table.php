<?php

use yii\db\Migration;

/**
 * Handles the creation of table `page`.
 */
class m180918_093239_create_page_table extends Migration
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
        $this->createTable('page', [
            'id' => $this->primaryKey(),
            'page_id' => $this->string(),
            'title'   => $this->string(),
            'status'  => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('page');
    }
}
