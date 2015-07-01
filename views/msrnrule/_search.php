<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MsrnRuleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msrn-rule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cmn') ?>

    <?= $form->field($model, 'area') ?>

    <?= $form->field($model, 'equipment') ?>

    <?= $form->field($model, 'new_msrn') ?>

    <?= $form->field($model, 'last_counter') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
