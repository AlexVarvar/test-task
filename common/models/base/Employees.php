<?php

namespace common\models\base;

use common\models\Branches;
use common\models\EmployeeTerminals;
use common\models\Terminals;
use yii\db\ActiveRecord;

/**
 * This is the base model class for table "employees".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property integer $position_id
 * @property integer $branch_id
 * @property string $added_date
 * @property string $updated_date
 * @property integer $status_id
 */
class Employees extends ActiveRecord
{
    const PAGE_SIZE = 10;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'position_id', 'branch_id', 'status_id'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return parent::attributeLabels();
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

    public function getBranches()
    {
        return $this->hasOne(Branches::class, ['id' => 'branch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeStatuses()
    {
        return $this->hasOne(EmployeeStatuses::class, ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeePositions()
    {
        return $this->hasOne(EmployeePositions::class, ['id' => 'position_id']);
    }
}
