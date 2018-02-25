<?php

use common\models\base\EmployeePositions;
use common\models\Branches;
use common\models\EmployeeStatuses;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Employees */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="employees-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput() ?>
    <?= $form->field($model, 'last_name')->textInput() ?>
    <?= $form->field($model, 'position_id')->dropDownList(EmployeePositions::find()->getList()) ?>
    <?= $form->field($model, 'branch_id')->dropDownList(Branches::getBranchesList()) ?>
    <?= $form->field($model, 'status_id')->dropDownList(EmployeeStatuses::getList()) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
