<?php

use yii\db\Migration;

/**
 * Handles the creation of table `employees`.
 */
class m180221_115824_create_employees_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('employees', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(50),
            'last_name' => $this->string(50),
            'position_id' => $this->integer(3),
            'branch_id' => $this->integer(3),
        ]);

        $this->createIndex('branch', 'employees', 'branch_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('employees');
    }
}
