<?php

use yii\db\Migration;

/**
 * Handles the creation of table `terminals`.
 */
class m180221_221129_create_terminals_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('terminals', [
            'id' => $this->primaryKey(),
            'code' => $this->string(4),
            'branch_id' => $this->smallInteger(),
            'manufacturer_id' => $this->tinyInteger(),
            'status_id' => $this->tinyInteger()->defaultValue(1),
            'img_url' => $this->string(),
            'added_date' => $this->dateTime(),
            'updated_date' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('terminals');
    }
}
