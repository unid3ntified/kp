<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DummyNumber */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dummy-number-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_msc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trunk_group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dummy_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'log_date')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
