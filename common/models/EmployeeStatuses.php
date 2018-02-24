<?php

namespace common\models;

use common\models\base\EmployeeStatuses as BaseEmployeeStatuses;
use yii\helpers\ArrayHelper;

class EmployeeStatuses extends BaseEmployeeStatuses
{
    public static function getEmployeeStatuses()
    {
        return self::find()
            ->asArray()
            ->all();
    }

    public static function getList()
    {
        return ArrayHelper::map(self::getEmployeeStatuses(), 'id', 'name');
    }
}