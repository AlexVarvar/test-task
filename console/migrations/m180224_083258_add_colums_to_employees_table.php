<?php

use yii\db\Migration;

/**
 * Class m180224_083258_add_colums_to_employees_table
 */
class m180224_083258_add_colums_to_employees_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('employees', 'added_date', $this->date());
        $this->addColumn('employees', 'updated_date', $this->dateTime());
        $this->addColumn('employees', 'status_id', $this->tinyInteger()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('employees', 'added_date');
        $this->dropColumn('employees', 'updated_date');
        $this->dropColumn('employees', 'status_id');
    }
}
