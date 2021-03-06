<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SctPortHuawei */

$this->title = 'Update Sct Port Huawei: ' . ' ' . $model->No;
$this->params['breadcrumbs'][] = ['label' => 'Sct Port Huaweis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->No, 'url' => ['view', 'id' => $model->No]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sct-port-huawei-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
