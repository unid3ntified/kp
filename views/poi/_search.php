<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PoiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="poi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'poi') ?>

    <?= $form->field($model, 'msc_name') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'MSRN') ?>

    <?= $form->field($model, 'dummy_number') ?>

    <?php // echo $form->field($model, 'log_date') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
