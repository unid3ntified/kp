<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SctPortHuaweiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sct-port-huawei-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'No') ?>

    <?= $form->field($model, 'mss_huawei') ?>

    <?= $form->field($model, 'sctp_port') ?>

    <?= $form->field($model, 'last_counter') ?>

    <?= $form->field($model, 'Remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
