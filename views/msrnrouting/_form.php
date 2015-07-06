<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MsrnRouting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msrn-routing-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= //$form->field($model, 'cluster')->textInput(['maxlength' => true]) ?>

    <?= //$form->field($model, 'mss')->textInput(['maxlength' => true]) ?>

    <?= //$form->field($model, 'first_route')->textInput(['maxlength' => true]) ?>

    <?= //$form->field($model, 'second_route')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
