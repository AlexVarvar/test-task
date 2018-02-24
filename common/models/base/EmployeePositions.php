<?php

namespace common\models\base;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "employee_positions".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $added_date
 */
class EmployeePositions extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_positions';
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
            'id' => Yii::t('common/position', 'ID'),
            'name' => Yii::t('common/position', 'Name'),
            'description' => Yii::t('common/position', 'Description'),
            'added_date' => Yii::t('common/position', 'Added Date'),
        ];
    }

    /**
     * @inheritdoc
     * @return EmployeePositionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmployeePositionsQuery(get_called_class());
    }
}
