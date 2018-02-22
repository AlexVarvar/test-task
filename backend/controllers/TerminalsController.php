<?php
namespace backend\controllers;

use common\models\search\TerminalsSearch;
use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class TerminalsController extends Controller
{
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
        $searchModel = new TerminalsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
