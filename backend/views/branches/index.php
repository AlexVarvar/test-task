<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\grid\GridView;

$this->title = 'List branches';

$gridColumns = [
    [
        'attribute' => 'id',
        'width' => '15px',
    ],
    [
        'attribute' => 'type',
    ],
    [
        'attribute' => 'name',
    ],
];



?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="body-content">

        <?= GridView::widget([
            'dataProvider'=> $dataProvider,
            'columns' => $gridColumns,
            'responsive'=>true,
            'hover'=>true
        ]); ?>

    </div>
</div>
