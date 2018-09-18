<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m180918_093915_create_product_table extends Migration
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
        $this->createTable('product', [
            'id'          => $this->primaryKey(),
            'title'       => $this->string(),
            'avatar'      => $this->string(),
            'price'       => $this->double(),
            'amount'      => $this->integer(),
            'discount'    => $this->integer(),
            'describe'    => $this->text(),
            'content'     => $this->text(),
            'status'      => $this->integer(),
            'category_id' => $this->integer(),
            'created_at'  => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey( 'fk_product_category', 'product', 'category_id', 'category', 'id', 'CASCADE' );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }
}
