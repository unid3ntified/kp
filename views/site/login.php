<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';
?>
<div class="row text-center">
    <div class="col-md-12" id="login-title">
        <h1>Sistem Informasi Network Element</h1>
    </div>
</div>
<div class="row" id="login">
    <div class="col-md-4 col-md-offset-4">  
        <div class="col-lg-12">
            <h2><center><?= Html::encode($this->title) ?></center></h2>
            <br>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
</div>
</div>


