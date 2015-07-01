<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SpcRule */

$this->title = 'Update Spc Rule: ' . ' ' . $model->No;
$this->params['breadcrumbs'][] = ['label' => 'Spc Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->No, 'url' => ['view', 'id' => $model->No]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="spc-rule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
