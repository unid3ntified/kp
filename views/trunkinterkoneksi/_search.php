<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrunkInterkoneksiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trunk-interkoneksi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'trunk_id') ?>

    <?= $form->field($model, 'dummy_no') ?>

    <?= $form->field($model, 'direction') ?>

    <?= $form->field($model, 'vendor') ?>

    <?= $form->field($model, 'opc') ?>

    <?php // echo $form->field($model, 'dpc') ?>

    <?php // echo $form->field($model, 'e1_capacity') ?>

    <?php // echo $form->field($model, 'POI') ?>

    <?php // echo $form->field($model, 'connection') ?>

    <?php // echo $form->field($model, 'trunk_group') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'log_date') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
