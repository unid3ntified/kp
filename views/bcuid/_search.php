<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BcuIdSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bcu-id-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name_mgw') ?>

    <?= $form->field($model, 'pool') ?>

    <?= $form->field($model, 'vendor') ?>

    <?= $form->field($model, 'provinsi') ?>

    <?= $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'bcu_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'log_date') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
