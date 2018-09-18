<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customer`.
 */
class m180918_095304_create_customer_table extends Migration
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
        $this->createTable('customer', [
            'id' => $this->primaryKey(),
            'name' => $this->string(), 
            'email'    => $this->string()->notNull()->unique(),

            'brithday'   => $this->dateTime(),
            'gender'     => $this->integer(),
            'permission' => $this->integer(),
            'province_id'=> $this->integer(),
            'district_id'=> $this->integer(),
            'address'    => $this->string(),
           
            'phone' => $this->string(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('customer');
    }
}
