<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m180918_093600_create_category_table extends Migration
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
        $this->createTable('category', [
            'id'        => $this->primaryKey(),
            'title'     => $this->string(),
            'avatar'    => $this->string(),
            'describe'  => $this->string(),
            'parent_id' => $this->integer(),
            'status'    => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }
}
