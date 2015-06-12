<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MipReferenceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mip-reference-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name_msc') ?>

    <?= $form->field($model, 'nri_msc') ?>

    <?= $form->field($model, 'nri') ?>

    <?= $form->field($model, 'null_nri') ?>

    <?= $form->field($model, 'non_broadcastLAI') ?>

    <?php // echo $form->field($model, 'cnid') ?>

    <?php // echo $form->field($model, 'cap_value') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'log_date') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
