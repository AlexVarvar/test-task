<?php

namespace common\models\search;

use common\models\Terminals;
use yii\data\ActiveDataProvider;

/**
 * common\models\search\TerminalsSearch represents the model behind the search form about `common\models\Terminals`.
 */
class TerminalsSearch extends Terminals
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'manufacturer_id', 'status_id'], 'integer'],
            [['code', 'img_url', 'added_date', 'updated_date'], 'string'],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Terminals::find()
            ->joinWith('branches');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Terminals::PAGE_SIZE,
            ],
            'sort'=> [
                'defaultOrder' => [
                    'added_date' => SORT_DESC
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'manufacturer_id' => $this->manufacturer_id,
            'status_id' => $this->status_id,
            'code' => $this->code,
            'added_date' => $this->added_date,
            'updated_date' => $this->updated_date,
        ]);

        //$this->setDateSearch($query);

        return $dataProvider;
    }
}