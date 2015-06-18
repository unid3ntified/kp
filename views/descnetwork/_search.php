<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DescNetworkSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="desc-network-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'network_id') ?>

    <?= $form->field($model, 'opc_nat0') ?>

    <?= $form->field($model, 'opc_nat1') ?>

    <?= $form->field($model, 'desc_network') ?>

    <?php // echo $form->field($model, 'second_opc') ?>

    <?php // echo $form->field($model, 'third_opc') ?>

    <?php // echo $form->field($model, 'fourth_opc') ?>

    <?php // echo $form->field($model, 'fifth_opc') ?>

    <?php // echo $form->field($model, 'sixth_opc') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
