<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bsc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bsc-form">

    <p>
    <h4>* Jika MGW atau BSC tidak ada dalam drop down list, silahkan buat network element baru di <?= Html::a('sini', ['/networkelement/create']) ?></h4>
    </p>
    <br>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bsc_id')->dropDownList($listData, ['prompt' => 'Choose BSC']) ?>

    <?= $form->field($model, 'mgw')->dropDownList($listData, ['prompt' => 'Choose MGW']) ?>

    <?= $form->field($model, 'msc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trunk_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
