<?php

namespace common\models\base;

use yii\db\ActiveRecord;

/**
 * This is the base model class for table "branches".
 *
 * @property integer $id
 * @property string $type
 * @property string $name
 */
class Branches extends ActiveRecord
{
    const PAGE_SIZE = 10;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name'], 'required'],
        ];
    }

    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{branches}}';
    }
}