<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrunkVoipSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trunk-voip-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'search', ['inputOptions' => ['size' => '20']]) ?>

    <?php ActiveForm::end(); ?>

</div>
