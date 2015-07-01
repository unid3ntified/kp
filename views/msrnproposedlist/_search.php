<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MsrnProposedlistSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msrn-proposedlist-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'No') ?>

    <?= $form->field($model, 'Regional') ?>

    <?= $form->field($model, 'MSS') ?>

    <?= $form->field($model, 'Existing_MSRN') ?>

    <?= $form->field($model, 'New_MSRN') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'Reserved_by') ?>

    <?php // echo $form->field($model, 'Updated') ?>

    <?php // echo $form->field($model, 'Remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
