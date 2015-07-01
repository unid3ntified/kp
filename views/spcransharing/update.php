<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SpcRansharing */

$this->title = 'Update Spc Ransharing: ' . ' ' . $model->No;
$this->params['breadcrumbs'][] = ['label' => 'Spc Ransharings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->No, 'url' => ['view', 'id' => $model->No]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="spc-ransharing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
