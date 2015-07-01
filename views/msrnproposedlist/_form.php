<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MsrnProposedlist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msrn-proposedlist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Regional')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MSS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Existing_MSRN')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'New_MSRN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Reserved_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Updated')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
