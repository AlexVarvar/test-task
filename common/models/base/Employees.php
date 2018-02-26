<?php

namespace common\models\base;

use common\components\Core\BaseQuery;
use common\models\Branches;
use common\models\EmployeeTerminals;
use common\models\Terminals;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

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

    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'added_date',
                'updatedAtAttribute' => 'updated_date',
                'value' => date('Y-m-d G:i:s')
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'fullName' => Yii::t('common', 'Full Name'),
            'fullDate' => Yii::t('common', 'Full Date'),
            'branch_id' => Yii::t('common', 'Branch Id'),
            'employeeTerminalsCount' => Yii::t('backend/employee', 'Employee Terminals Count'),
            'terminals_group' => Yii::t('backend/employee', 'Terminals Group'),
        ];
    }

    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{employees}}';
    }

    /**
     * @inheritdoc
     * @return BaseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BaseQuery(get_called_class());
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getFullDate()
    {
        return $this->added_date . ' / ' . $this->updated_date;
    }

    public function getEmployeeTerminals()
    {
        return $this->hasMany(EmployeeTerminals::class, ['employee_id' => 'id']);
    }

    public function getEmployeeTerminalsCount()
    {
        return $this->getEmployeeTerminals()->count();
    }

    public function getTerminalsList()
    {
        $list = $this->getTerminals()->asArray()->all();
        return ArrayHelper::map($list, 'id', 'code', 'branch_id');
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
