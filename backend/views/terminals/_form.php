<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\additions\Manufacturers;
use common\models\Branches;

/* @var $this yii\web\View */
/* @var $model common\models\base\Terminals */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="branches-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => 4]) ?>
    <?= $form->field($model, 'branch_id')->dropDownList(Branches::getBranchesList()) ?>
    <?= $form->field($model, 'manufacturer_id')->dropDownList(Manufacturers::getManufacturers()) ?>
    <?= $form->field($model, 'status_id')->dropDownList($model::getStatus()) ?>
    <?= $form->field($model, 'img_url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
