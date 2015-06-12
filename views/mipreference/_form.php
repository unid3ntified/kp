<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MipReference */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mip-reference-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_msc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nri_msc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'null_nri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'non_broadcastLAI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cnid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cap_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'log_date')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
