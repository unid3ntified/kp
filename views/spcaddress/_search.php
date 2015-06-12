<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpcAddressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spc-address-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'network_element') ?>

    <?= $form->field($model, 'pool') ?>

    <?= $form->field($model, 'location') ?>

    <?= $form->field($model, 'provinsi') ?>

    <?= $form->field($model, 'vendor') ?>

    <?php // echo $form->field($model, 'sc_address') ?>

    <?php // echo $form->field($model, 'gtt') ?>

    <?php // echo $form->field($model, 'opc_nat1') ?>

    <?php // echo $form->field($model, 'opc_nat0') ?>

    <?php // echo $form->field($model, '2nd_OPC') ?>

    <?php // echo $form->field($model, '3rd_OPC') ?>

    <?php // echo $form->field($model, '4th_OPC') ?>

    <?php // echo $form->field($model, '5th_OPC') ?>

    <?php // echo $form->field($model, '6th_OPC') ?>

    <?php // echo $form->field($model, 'INAT0') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'log_date') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
