<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Descnetwork */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="desc-network-form">

    <p>
    <h4>* Jika network_element id tidak ada dalam drop down list, silahkan buat network element baru di <?= Html::a('sini', ['/networkelement/create']) ?></h4>
    </p>
    <p>
        <font color="red"><?= $err ?></font>
    </p>
    <br>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'network_element_id')->dropDownList($listData, ['prompt'=>'Choose Network ID']) ?>

    <?= $form->field($model, 'opc_nat0')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opc_nat1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc_network')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'inat0')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'second_opc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'third_opc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fourth_opc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fifth_opc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sixth_opc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
