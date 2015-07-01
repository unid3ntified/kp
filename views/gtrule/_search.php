<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GtRuleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gt-rule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'No') ?>

    <?= $form->field($model, 'STP') ?>

    <?= $form->field($model, 'Area') ?>

    <?= $form->field($model, 'Equipment') ?>

    <?= $form->field($model, 'GT') ?>

    <?php // echo $form->field($model, 'Last_counter') ?>

    <?php // echo $form->field($model, 'Remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
