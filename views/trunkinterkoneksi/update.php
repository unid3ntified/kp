<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrunkInterkoneksi */

$this->title = 'Update Trunk Interkoneksi: ' . ' ' . $model->trunk_id;
$this->params['breadcrumbs'][] = ['label' => 'Trunk Interkoneksi List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->trunk_id, 'url' => ['view', 'id' => $model->trunk_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trunk-interkoneksi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'option' => $option,
        'listData' => $listData,
    ]) ?>

</div>
