<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrunkVoip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trunk-voip-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'trunk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'partner')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'voip_gateway')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'connection')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direction')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vendor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mss')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mgw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ip_partner')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ip_xl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ip_realm')->textInput() ?>

    <?= $form->field($model, 'sa_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e1_capacity')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList($option, ['prompt'=>'Pilih Status']) ?>

    <?= $form->field($model, 'log_date')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
