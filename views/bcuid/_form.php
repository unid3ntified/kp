<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BcuId */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bcu-id-form">

    <p>
    <h4>* Jika MGW Name tidak ada dalam drop down list, silahkan buat network element baru di <?= Html::a('sini', ['/networkelement/create']) ?></h4>
    </p>
    <br>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mgw_name')->dropDownList($listData, ['prompt' => 'Choose MGW']) ?>

    <?= $form->field($model, 'bcu_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'old_mss_connected')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_mss_connected')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(['Dismantle', 'In Service', 'Plan', 'Trial'], ['prompt' => 'Choose Status']) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
