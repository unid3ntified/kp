<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BcuId */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bcu-id-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_mgw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pool')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'vendor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provinsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'bcu_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList($option, ['prompt'=>'Pilih Status']) ?>

    <?= $form->field($model, 'log_date')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
