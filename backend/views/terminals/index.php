<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\grid\GridView;

$this->title = 'List terminals';

$gridColumns = [
    [
        'attribute' => 'id',
        'width' => '15px',
    ],
    [
        'attribute' => 'branch_id',
        'value' => 'branches.name'
    ],
    [
        'attribute' => 'manufacturer_id',
        'value' => function ($model) {
            return $model->nameManufacturer;
        }
    ],
    [
        'attribute' => 'status_id',
        'value' => 'nameStatus' /* model->getNameStatus() */

    ],
    [
        'attribute' => 'code',
    ],
    [
        'attribute' => 'img_url',
    ],
    [
        'attribute' => 'added_date',
    ],
    [
        'attribute' => 'updated_date',
    ],
    [
        'class' => '\kartik\grid\ActionColumn',
        'template' => '{view} {update} {delete}',
        'buttons' => [
            'view' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                    'title' => 'view',
                ]);
            },
            'update' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                    'title' => 'update',
                ]);
            },
            'delete' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                    'title' => 'delete ' . $model->code,
                ]);
            }

        ],
    ]
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
