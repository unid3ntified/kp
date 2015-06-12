<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SpcAddress */

$this->title = 'Update Spc Address: ' . ' ' . $model->network_element;
$this->params['breadcrumbs'][] = ['label' => 'Spc Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->network_element, 'url' => ['view', 'id' => $model->network_element]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="spc-address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'option' => $option,
    ]) ?>

</div>