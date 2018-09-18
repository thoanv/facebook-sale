<?php

use yii\db\Migration;

/**
 * Handles the creation of table `transport`.
 */
class m180918_101732_create_transport_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {    $tableOptions = null;
        if ( $this->db->driverName === 'mysql' ) {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('transport', [
            'id' => $this->primaryKey(),
            'title' => $this->string(), 
            'note'  => $this->string(), 
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('transport');
    }
}
