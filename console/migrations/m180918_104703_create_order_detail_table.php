<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order_detail`.
 */
class m180918_104703_create_order_detail_table extends Migration
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
        $this->createTable('order_detail', [
            'id'       => $this->primaryKey(),
            'order_id' => $this->integer(), 
            'product_id' => $this->integer(), 
            'amount'   => $this->integer(),
        ], $tableOptions);
        $this->addForeignKey( 'fk_order_detail_order', 'order_detail', 'order_id', 'order', 'id', 'CASCADE' );
        $this->addForeignKey( 'fk_order_detail_product', 'order_detail', 'product_id', 'product', 'id', 'CASCADE' );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('order_detail');
    }
}
