<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MscSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msc-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'msc_name') ?>

    <?= $form->field($model, 'cnid') ?>

    <?= $form->field($model, 'dummy_number') ?>

    <?= $form->field($model, 'pool') ?>

    <?= $form->field($model, 'non_broadcast_lai') ?>

    <?php // echo $form->field($model, 'null_nri') ?>

    <?php // echo $form->field($model, 'nri_msc') ?>

    <?php // echo $form->field($model, 'spc_msc') ?>

    <?php // echo $form->field($model, 'cap_value') ?>

    <?php // echo $form->field($model, 'nb_lai') ?>

    <?php // echo $form->field($model, 'msc_index') ?>

    <?php // echo $form->field($model, 'msc_IP_sigtran1') ?>

    <?php // echo $form->field($model, 'msc_IP_sigtran2') ?>

    <?php // echo $form->field($model, 'mgw_proxyA_flex') ?>

    <?php // echo $form->field($model, 'mgw_managerA_circuit') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'log_date') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
