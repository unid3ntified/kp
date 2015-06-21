<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NetworkElementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="network-element-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <?= $form->field($model, 'network_id') ?>

    <?= $form->field($model, 'sc_address') ?>

    <?= $form->field($model, 'location') ?>

    <?= $form->field($model, 'provinsi') ?>

    <?= $form->field($model, 'vendor') ?>

    <?php // echo $form->field($model, 'gtt') ?>

    <?php // echo $form->field($model, 'inat0') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'log_date') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
