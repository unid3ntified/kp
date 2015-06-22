<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Poi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="poi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'poi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'msc_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'MSRN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dummy_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'log_date')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
