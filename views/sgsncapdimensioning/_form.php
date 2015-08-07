<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SgsnCapDimensioning */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sgsn-cap-dimensioning-form">

    <p>
    <h4>* Jika Node Name tidak ada dalam drop down list, silahkan buat SGSN baru di <?= Html::a('sini', ['/networkelement/create']) ?></h4>
    </p>
    <br>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'node_name')->dropDownList($listSgsn, ['prompt' => 'Select SGSN']) ?>

    <?= $form->field($model, 'site_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'technology_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vendor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hardware_version')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'software_level')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cap_max_sau')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cap_max_pdp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cap_used_sau')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cap_used_pdp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cap_used_sau_percent')->textInput() ?>

    <?= $form->field($model, 'cap_used_pdp_percent')->textInput() ?>

    <?= $form->field($model, 'cpu_utilisation_percent')->textInput() ?>

    <?= $form->field($model, 'memory_utilisation_percent')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
