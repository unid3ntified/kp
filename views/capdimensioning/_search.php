<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CapDimensioningSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cap-dimensioning-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'node_id') ?>

    <?= $form->field($model, 'region') ?>

    <?= $form->field($model, 'hw_type') ?>

    <?= $form->field($model, 'software_release') ?>

    <?= $form->field($model, 'subs_capacity') ?>

    <?php // echo $form->field($model, 'erlang_capacity') ?>

    <?php // echo $form->field($model, 'bhca_capacity') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
