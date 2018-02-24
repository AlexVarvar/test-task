<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $additionalColumns array */
/* @var $searchModel common\models\search\EmployeesSearch */

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('backend', 'List employees');
$this->params['breadcrumbs'][] = $this->title;

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
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
    [
        'attribute' => 'status_id',
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
                    'title' => 'delete ' . $model->id,
                ]);
            }

        ],
    ]
];

?>
<div class="site-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <p>
        <?= Html::a(Yii::t('backend/employee', 'Create employee'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="body-content">

        <?= GridView::widget([
            'dataProvider'=> $dataProvider,
            'columns' => $gridColumns,
            'filterModel' => $searchModel,
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
