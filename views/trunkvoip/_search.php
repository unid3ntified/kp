<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrunkVoipSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trunk-voip-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'trunk_id') ?>

    <?= $form->field($model, 'dummy_no') ?>

    <?= $form->field($model, 'mgw_name') ?>

    <?= $form->field($model, 'detaill') ?>

    <?= $form->field($model, 'direction') ?>

    <?php // echo $form->field($model, 'konfigurasi') ?>

    <?php // echo $form->field($model, 'partner') ?>

    <?php // echo $form->field($model, 'e1') ?>

    <?php // echo $form->field($model, 'opc_mss') ?>

    <?php // echo $form->field($model, 'dpc') ?>

    <?php // echo $form->field($model, 'voip_gateway') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'log_date') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
