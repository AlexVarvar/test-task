<?php

namespace common\components\core;

use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BaseController extends Controller
{
    /**
     * Finds the model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param string $model model class name in string format
     * @return object of loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id, string $model)
    {
        if (($model = $model::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}