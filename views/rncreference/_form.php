<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RncReference */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rnc-reference-form">

    <p>
    <h4>* Jika MGW Name atau RNC ID tidak ada dalam drop down list, silahkan buat network element baru di <?= Html::a('sini', ['/networkelement/create']) ?></h4>
    </p>
    <br>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rnc_id')->dropDownList($listRnc, ['prompt' => 'Choose RNC']) ?>

    <?= $form->field($model, 'rnc_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pool')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mgw_name')->dropDownList($listMgw, ['prompt' => 'Choose MGW']) ?>

    <?= $form->field($model, 'vendor_rnc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spc_nat0')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trunk_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rnc_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList($option, ['prompt' => 'Choose Status']) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
