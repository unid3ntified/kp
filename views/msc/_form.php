<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Msc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msc-form">

    <p>
    <h4>* Jika MSC Name tidak ada dalam drop down list, silahkan buat network element baru di <?= Html::a('sini', ['/networkelement/create']) ?></h4>
    </p>
    <br>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'msc_name')->dropDownList($listData, ['prompt' => 'Choose MSC']) ?>

    <?= $form->field($model, 'cnid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pool')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'non_broadcast_lai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'null_nri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nri_msc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spc_msc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cap_value')->textInput() ?>

    <?= $form->field($model, 'nb_lai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'msc_index')->textInput() ?>

    <?= $form->field($model, 'msc_IP_sigtran1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'msc_IP_sigtran2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mgw_proxyA_flex')->checkbox(['MGW Proxy A Flex']) ?>

    <?= $form->field($model, 'mgw_managerA_circuit')->checkbox(['MGW Manager A Circuit']) ?>

    <?= $form->field($model, 'status')->dropDownList(['Dismantle', 'In service', 'Plan', 'Trial'], ['prompt' => 'Choose Status']) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
