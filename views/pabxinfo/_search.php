<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PabxInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pabx-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'No') ?>

    <?= $form->field($model, 'Regional') ?>

    <?= $form->field($model, 'LAC') ?>

    <?= $form->field($model, 'DN') ?>

    <?= $form->field($model, 'Remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
