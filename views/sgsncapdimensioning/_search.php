<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SgsnCapDimensioningSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sgsn-cap-dimensioning-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'node_name') ?>

    <?= $form->field($model, 'site_name') ?>

    <?= $form->field($model, 'technology_type') ?>

    <?= $form->field($model, 'vendor') ?>

    <?= $form->field($model, 'hardware_version') ?>

    <?php // echo $form->field($model, 'software_level') ?>

    <?php // echo $form->field($model, 'cap_max_sau') ?>

    <?php // echo $form->field($model, 'cap_max_pdp') ?>

    <?php // echo $form->field($model, 'cap_used_sau') ?>

    <?php // echo $form->field($model, 'cap_used_pdp') ?>

    <?php // echo $form->field($model, 'cap_used_sau_percent') ?>

    <?php // echo $form->field($model, 'cap_used_pdp_percent') ?>

    <?php // echo $form->field($model, 'cpu_utilisation_percent') ?>

    <?php // echo $form->field($model, 'memory_utilisation_percent') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
