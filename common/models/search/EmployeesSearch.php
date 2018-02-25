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
    public $fullName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status_id'], 'integer'],
            [['fullName'], 'safe'],
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
        $dataProvider->setSort([
            'attributes' => [
                'fullName' => [
                    'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
                    'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
                    'label' => 'Full Name',
                ],
                'status_id',
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'status_id', $this->first_name])
            ->andWhere('first_name LIKE "%' . $this->fullName . '%" ' .
            'OR last_name LIKE "%' . $this->fullName . '%" '.
            'OR CONCAT(first_name, " ", last_name) LIKE "%' . $this->fullName . '%"'
        );

        return $dataProvider;
    }
}