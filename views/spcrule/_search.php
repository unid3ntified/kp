<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpcRuleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spc-rule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'No') ?>

    <?= $form->field($model, 'Area') ?>

    <?= $form->field($model, 'SPC') ?>

    <?= $form->field($model, 'Jenis') ?>

    <?= $form->field($model, 'Last_counter') ?>

    <?php // echo $form->field($model, 'Remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
