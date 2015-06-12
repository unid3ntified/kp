<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RncReferenceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rnc-reference-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'msc_name') ?>

    <?= $form->field($model, 'mgw_name') ?>

    <?= $form->field($model, 'rnc_name') ?>

    <?= $form->field($model, 'vendor_rnc') ?>

    <?= $form->field($model, 'spc_nat0') ?>

    <?php // echo $form->field($model, 'trunk_name') ?>

    <?php // echo $form->field($model, 'rnc_description') ?>

    <?php // echo $form->field($model, 'rnc_location') ?>

    <?php // echo $form->field($model, 'provinsi') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'log_date') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
