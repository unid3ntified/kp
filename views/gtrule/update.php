<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GtRule */

$this->title = 'Update Gt Rule: ' . ' ' . $model->No;
$this->params['breadcrumbs'][] = ['label' => 'Gt Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->No, 'url' => ['view', 'id' => $model->No]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gt-rule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
