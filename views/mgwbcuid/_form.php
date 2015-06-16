<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MgwBcuId */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mgw-bcu-id-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bcu_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'old_mss_connected')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_mss_connected')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
