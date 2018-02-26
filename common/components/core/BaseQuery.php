<?php

namespace common\components\Core;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class.
 *
 */
class BaseQuery extends ActiveQuery
{
    /**
     * @inheritdoc
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
