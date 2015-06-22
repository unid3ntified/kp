<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrunkInterkoneksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trunk-interkoneksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'trunk_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direction')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vendor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dpc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e1_capacity')->textInput() ?>

    <?= $form->field($model, 'POI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'connection')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 't_group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList($option, ['prompt' => 'Choose Status']) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
