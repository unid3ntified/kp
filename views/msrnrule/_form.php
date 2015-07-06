<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MsrnRule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msrn-rule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cmn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'equipment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_msrn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_counter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
