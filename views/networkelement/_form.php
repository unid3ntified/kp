<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NetworkElement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="network-element-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'network_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sc_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'provinsi')->dropDownList($prov, ['prompt'=>'Choose Provinsi']) ?>

    <?= $form->field($model, 'vendor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gtt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList($option, ['prompt'=>'Choose Status']) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
