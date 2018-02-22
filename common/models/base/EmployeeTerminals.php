<?php

namespace common\models\base;

use yii\db\ActiveRecord;

/**
 * This is the base model class for table "employee_terminals".
 *
 * @property integer $id
 * @property string $employee_id
 * @property string $terminal_id
 */
class EmployeeTerminals extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'terminal_id'], 'required'],
        ];
    }

    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{employee_terminals}}';
    }

    public function getEmployees()
    {
        return $this->hasMany(Employees::class, ['id' => 'employee_id']);
    }
}