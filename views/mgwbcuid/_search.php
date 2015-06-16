<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MgwBcuIdSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mgw-bcu-id-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mgw_name') ?>

    <?= $form->field($model, 'bcu_id') ?>

    <?= $form->field($model, 'old_mss_connected') ?>

    <?= $form->field($model, 'new_mss_connected') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
