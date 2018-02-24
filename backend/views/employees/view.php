<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\base\Employees */

$this->title = $model->first_name . ' ' . $model->last_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/employee', 'Employees'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('common', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('common', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('common', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'last_name',
            'employeePositions.name',
            'branches.name',
            'employeeStatuses.name',
            'added_date',
            'updated_date',
        ],
    ]) ?>
</div>
