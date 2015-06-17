<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BcuId */

$this->title = 'Update MGW: ' . ' ' . $model->mgw_name;
$this->params['breadcrumbs'][] = ['label' => 'MGW list', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mgw_name, 'url' => ['view', 'id' => $model->mgw_name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bcu-id-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'option' => $option,
    ]) ?>

</div>
