<?php

use yii\db\Migration;

/**
 * Handles the creation of table `employee_terminals`.
 */
class m180222_080553_create_employee_terminals_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('employee_terminals', [
            'id' => $this->primaryKey(),
            'employee_id' => $this->integer(),
            'terminal_id' => $this->integer()
        ]);

        $this->createIndex('employee_id', 'employee_terminals', 'employee_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('employee_terminals');
    }
}
