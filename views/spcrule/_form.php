<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpcRule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spc-rule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SPC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Jenis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Last_counter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
