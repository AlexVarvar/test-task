<?php

namespace common\models\search;

use common\models\Employees;
use yii\data\ActiveDataProvider;
use yii\base\Model;

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
            [['id', 'status_id'], 'integer'],
            [['first_name', 'last_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
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
            'pagination' => [
                'pageSize' => Employees::PAGE_SIZE,
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'status_id' => $this->status_id,
        ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'status_id', $this->status_id]);

        //$this->setDateSearch($query);

        return $dataProvider;
    }
}