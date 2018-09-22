<?php

use yii\db\Migration;

/**
 * Class m180920_081601_update_post_table
 */
class m180920_081601_update_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('post','created_at', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180920_081601_update_post_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180920_081601_update_post_table cannot be reverted.\n";

        return false;
    }
    */
}
