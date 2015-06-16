<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RncReference */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rnc-reference-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'msc_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mgw_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rnc_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vendor_rnc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spc_nat0')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trunk_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rnc_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rnc_location')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'provinsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->checkBoxList($option, array('separator' => '<br>')) ?>

    <?= $form->field($model, 'log_date')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
