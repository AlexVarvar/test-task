<?php

namespace common\models\base;

use yii\db\ActiveRecord;
use common\models\EmployeeTerminals;
use common\models\Terminals;


/**
 * This is the base model class for table "employees".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property integer $position_id
 * @property integer $branch_id
 */
class Employees extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'position_id', 'branch_id'], 'required'],
        ];
    }


    public function attributeLabels()
    {
        return parent::attributeLabels(); // TODO: Change the autogenerated stub
    }

    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{employees}}';
    }

    public function getEmployeeTerminals()
    {
        return $this->hasMany(EmployeeTerminals::class, ['employee_id' => 'id']);
    }

    public function getTerminals()
    {
        return $this->hasMany(Terminals::class, ['id' => 'terminal_id'])
            ->via('employeeTerminals');
    }
}