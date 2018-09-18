<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m180918_104128_create_order_table extends Migration
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
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer(), 
            'province_id' => $this->integer(), 
            'district_id' => $this->integer(),
            'place_delivery' => $this->text(),
            'delivery_time' => $this-> dateTime(),
            'phone'       => $this->string(),   
            'email'       => $this->string(),
            'note'        => $this->string(),
            'transport_id'   => $this->integer(),
        ], $tableOptions);
        $this->addForeignKey( 'fk_order_customer', 'order', 'customer_id', 'customer', 'id', 'CASCADE' );
        $this->addForeignKey( 'fk_order_transport', 'order', 'transport_id', 'transport', 'id', 'CASCADE' );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('order');
    }
}
