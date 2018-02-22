<?php

namespace common\traits;

use yii\db\ActiveQuery;

/**
 * trait used in search models
 * Trait SearchTrait
 * @package common\traits
 */
trait SearchTrait
{
    /**
     * @param ActiveQuery $query
     * @param string $attribute
     * @param $field string
     */
    protected function setDateSearch(ActiveQuery $query, $attribute = 'updated', $field = '')
    {
        $dates = explode(' - ', $this->{$attribute});
        if (!$field) {
            $field = $attribute;
        }
        if (!isset($dates[1])) {
            $query->andFilterWhere([
                'DATE('.$field.')' => $this->{$attribute},
            ]);
        } else {
            $query->andFilterWhere(['>=', 'DATE('.$field.')', $this->{$attribute}]);
            $query->andFilterWhere(['<=', 'DATE('.$field.')', $dates[1]]);
        }
        if (is_array($dates)) {
            $this->{$attribute} = implode(' - ', $dates);
        }
    }
}