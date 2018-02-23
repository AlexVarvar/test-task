<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\base\Terminals */

$this->title = Yii::t('app', 'Update Terminals: {nameAttribute}', [
    'nameAttribute' => $model->code,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Terminals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->code, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="branches-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
