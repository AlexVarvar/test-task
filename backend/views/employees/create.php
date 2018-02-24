<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\base\Employees */

$this->title = Yii::t('backend/employee', 'Create Employees');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/employee', 'Employees'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
