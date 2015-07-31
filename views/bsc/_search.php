<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BscSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bsc-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bsc_id') ?>

    <?= $form->field($model, 'mgw') ?>

    <?= $form->field($model, 'msc') ?>

    <?= $form->field($model, 'trunk_name') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'log_date') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
