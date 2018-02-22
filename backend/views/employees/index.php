<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $additionalColumns array */

use yii\helpers\Html;
use kartik\grid\GridView;

$this->title = 'List employees';

$gridColumns = [
    [
        'attribute' => 'id',
        'width' => '15px',
    ],
    [
        'attribute' => 'first_name',
    ],
    [
        'attribute' => 'last_name',
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
