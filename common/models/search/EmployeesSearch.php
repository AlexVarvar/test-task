<?php

namespace common\models\search;

use common\models\Employees;
use yii\data\ActiveDataProvider;

/**
 * common\models\search\EmployeesSearch represents the model behind the search form about `common\models\Employees`.
 */
class EmployeesSearch extends Employees
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['first_name', 'last_name'], 'safe'],
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
        $query = Employees::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
        ]);

        //$this->setDateSearch($query);

        return $dataProvider;
    }
}