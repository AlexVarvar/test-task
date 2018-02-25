<?php

namespace common\models\base;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Branches]].
 *
 * @see Branches
 */
class BranchesQuery extends ActiveQuery
{
    /**
     * @inheritdoc
     * @return Branches[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Branches|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
