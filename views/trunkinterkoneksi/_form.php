<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrunkInterkoneksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trunk-interkoneksi-form">

    <p>
    <h4>* Jika POI tidak ada dalam drop down list, silahkan buat POI baru di <?= Html::a('sini', ['/poi/create']) ?></h4>
    </p>
    <br>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'trunk_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direction')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vendor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dpc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e1_capacity')->textInput() ?>

    <?= $form->field($model, 'POI')->dropDownList($listData, ['prompt' => 'Choose POI']) ?>

    <?= $form->field($model, 'connection')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 't_group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList($option, ['prompt' => 'Choose Status']) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
