<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MsrnRoutingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msrn-routing-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'No') ?>

    <?= $form->field($model, 'cluster') ?>

    <?= $form->field($model, 'mss') ?>

    <?= $form->field($model, 'first_route') ?>

    <?= $form->field($model, 'second_route') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
