<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DummyNumberSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dummy-number-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name_msc') ?>

    <?= $form->field($model, 'trunk_group') ?>

    <?= $form->field($model, 'dummy_number') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'log_date') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
