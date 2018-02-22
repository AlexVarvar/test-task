<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Employees;
use common\models\search\EmployeesSearch;

/**
 * Site controller
 */
class EmployeesController extends Controller
{
    const PAGE_SIZE = 10;

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays employees list.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = new Employees();

        var_dump($result->getEmployeesInfo(1));

        die;


        $searchModel = new EmployeesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = self::PAGE_SIZE;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
