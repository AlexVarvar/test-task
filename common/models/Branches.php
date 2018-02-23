<?php

namespace common\models;

use common\models\base\Branches as BaseBranches;
use yii\helpers\ArrayHelper;

class Branches extends BaseBranches
{
    public static function getBranches()
    {
        return self::find()
            ->asArray()
            ->all();
    }

    public static function getBranchesList()
    {
        return ArrayHelper::map(self::getBranches(), 'id', 'name');
    }
}