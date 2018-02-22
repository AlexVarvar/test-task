<?php

namespace common\models;

use common\models\base\Employees as BaseEmployees;

class Employees extends BaseEmployees
{
    public function getEmployeesInfo($employee_id)
    {
        $model = self::findOne($employee_id);
        $terminals = $model->terminals;

        return $terminals;
    }
}