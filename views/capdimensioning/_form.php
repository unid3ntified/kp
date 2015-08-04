<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CapDimensioning */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cap-dimensioning-form">

    <p>
    <h4>* Jika Node ID tidak ada dalam drop down list, silahkan buat network element baru di <?= Html::a('sini', ['/networkelement/create']) ?></h4>
    </p>
    <br>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'node_id')->dropDownList($listData, ['prompt' => 'Choose Node']) ?>

    <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hw_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'software_release')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subs_capacity')->textInput() ?>

    <?= $form->field($model, 'erlang_capacity')->textInput() ?>

    <?= $form->field($model, 'bhca_capacity')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
