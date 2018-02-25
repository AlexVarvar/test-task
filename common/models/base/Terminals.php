<?php

namespace common\models\base;

use common\additions\Manufacturers;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the base model class for table "terminals".
 *
 * @property integer $id
 * @property string $code
 * @property integer $branch_id
 * @property integer $manufacturer_id
 * @property integer $status_id
 * @property string $img_url
 * @property string $added_date
 * @property string $updated_date
 */
class Terminals extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_STORE = 1;
    const STATUS_DELIVERY = 2;
    const STATUS_INSTALL = 3;
    const STATUS_ACTIVE = 4;

    const PAGE_SIZE = 10;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'branch_id', 'manufacturer_id', 'status_id', 'img_url', 'added_date', 'updated_date'], 'required'],
        ];
    }

    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{terminals}}';
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

    public static function getStatus()
    {
        return [
            self::STATUS_INACTIVE => 'Деактивирован',
            self::STATUS_STORE => 'Склад',
            self::STATUS_DELIVERY => 'Транспортировка',
            self::STATUS_INSTALL => 'Установлен',
            self::STATUS_ACTIVE => 'Активен',
        ];
    }

    public function getNameStatus()
    {
        return self::getStatus()[$this->status_id];
    }

    public function attributeLabels()
    {
        return [
            'nameStatus' => 'Status'
        ];
    }

    public function getNameManufacturer()
    {
        return Manufacturers::getManufacturers()[$this->manufacturer_id];
    }

    public function getBranches()
    {
        return $this->hasOne(\common\models\Branches::class, ['id' => 'branch_id']);
    }

}