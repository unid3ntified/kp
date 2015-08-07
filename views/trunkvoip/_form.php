<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrunkVoip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trunk-voip-form">
    
    <p>
    <h4>* Jika MGW atau MSS Name tidak ada dalam drop down list, silahkan buat network element baru di <?= Html::a('sini', ['/networkelement/create']) ?></h4>
    </p>
    <br>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'trunk_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mgw')->dropDownList($listMgw, ['prompt' => 'Choose MGW']) ?>

    <?= $form->field($model, 'mss')->dropDownList($listMsc, ['prompt' => 'Choose MSS']) ?>

    <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'direction')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'konfigurasi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'partner')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e1')->textInput() ?>

    <?= $form->field($model, 'opc_mss')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dpc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'voip_gateway')->textInput(['maxlength' => true])->label('VOIP Gateway (e.g. : SBC ACME packet, IMG, Telcobridge)') ?>

    <?= $form->field($model, 'status')->dropDownList($option, ['prompt' => 'Choose Status']) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
