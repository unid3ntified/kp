<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrunkVoip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trunk-voip-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'trunk_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dummy_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mgw_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detaill')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'direction')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'konfigurasi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'partner')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e1')->textInput() ?>

    <?= $form->field($model, 'opc_mss')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dpc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'voip_gateway')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'log_date')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
