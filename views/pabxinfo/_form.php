<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PabxInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pabx-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Regional')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LAC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
