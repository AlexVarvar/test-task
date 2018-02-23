<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel common\models\search\BranchesSearch */

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Branches');
$this->params['breadcrumbs'][] = $this->title;

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'attribute' => 'type',
    ],
    [
        'attribute' => 'name',
    ],
    ['class' => 'yii\grid\ActionColumn'],
];
?>
<div class="index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('app', 'Create Branches'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="body-content">
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider'=> $dataProvider,
            'columns' => $gridColumns,
            'filterModel' => $searchModel,
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
