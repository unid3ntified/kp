<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DescNetwork */

$this->title = 'Update OPC: ' . $model->network_element_id;
$this->params['breadcrumbs'][] = ['label' => 'OPC List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->network_element_id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="desc-network-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listData' => $listData,
        'err' => $err,
    ]) ?>

</div>
