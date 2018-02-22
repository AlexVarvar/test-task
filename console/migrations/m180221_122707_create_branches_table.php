<?php

use yii\db\Migration;

/**
 * Handles the creation of table `branches`.
 */
class m180221_122707_create_branches_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('branches', [
            'id' => $this->primaryKey(),
            'type' => $this->string(4),
            'name' => $this->string(),
        ]);

        $this->createIndex('type_branches', 'branches', 'type');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('branches');
    }
}
