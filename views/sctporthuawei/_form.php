<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SctPortHuawei */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sct-port-huawei-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mss_huawei')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sctp_port')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_counter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
