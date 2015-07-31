<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bsc */

$this->title = 'Update Bsc: ' . ' ' . $model->bsc_id;
$this->params['breadcrumbs'][] = ['label' => 'Bsc List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bsc_id, 'url' => ['view', 'bsc_id' => $model->bsc_id, 'mgw' => $model->mgw]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bsc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listData' => $listData,
    ]) ?>

</div>
