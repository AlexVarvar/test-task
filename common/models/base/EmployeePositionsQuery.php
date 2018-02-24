<?php

namespace common\models\base;

use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the ActiveQuery class for [[EmployeePositions]].
 *
 * @see EmployeePositions
 */
class EmployeePositionsQuery extends ActiveQuery
{
    /**
     * @inheritdoc
     * @return EmployeePositions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EmployeePositions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return array
     */
    public function getList()
    {
        return ArrayHelper::map($this->all(), 'id', 'name');
    }
}
