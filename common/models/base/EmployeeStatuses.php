<?php

namespace common\models\base;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "employee_statuses".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $added_date
 */
class EmployeeStatuses extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{employee_statuses}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['added_date'], 'safe'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name status',
            'description' => 'Description',
            'added_date' => 'Added Date',
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
                'updatedAtAttribute' => false,
                'value' => date('Y-m-d G:i:s')
            ],
        ];
    }


}
