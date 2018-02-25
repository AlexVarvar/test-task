<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model common\models\Employees */
/* @var $searchModel common\models\search\EmployeesSearch */

use common\models\Branches;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = Yii::t('backend', 'List employees');
$this->params['breadcrumbs'][] = $this->title;

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'attribute' => 'fullName',
    ],
    [
        'attribute' => 'status_id',
        'value' => 'employeeStatuses.name',
    ],
    [
        'attribute' => 'branch_id',
        'format' => 'raw',
        'value' => function ($model) {
            return Html::a(
                    $model['branches']['name'],
                    Url::to(['/branches/view', 'id' => $model['branches']['id']]),
                    ['target' => '_blank', 'class' => 'linksWithTarget']
            );
        },
    ],
    [
        'attribute' => 'terminals_group',
        'content'  => function ($model) {
            $list = $model->getTerminalsList();
            $branches_list = Branches::getBranchesList();
            $result = '';
            foreach ($list as $key_branch => $list_term) {
                if (!empty($branches_list[$key_branch])) {
                    $result .= $branches_list[$key_branch] . ' - ' . count($list_term) . ', ';
                } else {
                    $result .= $key_branch . ' - ' . count($list_term) . ', ';
                }
            }
            return $result;
        }
    ],
    [
        'attribute' => 'added_date',
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
