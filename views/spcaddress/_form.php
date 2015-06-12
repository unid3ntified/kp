<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpcAddress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spc-address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'network_element')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pool')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'location')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'provinsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vendor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sc_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gtt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opc_nat1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opc_nat0')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '2nd_OPC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '3rd_OPC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '4th_OPC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '5th_OPC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '6th_OPC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'INAT0')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'log_date')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
