<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\SignupForm */

$this->title = 'Create Admin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container" >  
    <div class="row" id="login">
        <div class="col-md-8 col-md-offset-4">
 
            <div class="col-lg-5">
            <h4><?= $notif; ?></h4>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'repeat_password')->passwordInput() ?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
                </div>
        </div>
    </div>
</div>
