<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RncReference */

$this->title = $model->rnc_id;
$this->params['breadcrumbs'][] = ['label' => 'RNC References', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rnc-reference-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'rnc_id',
            'rnc_name',
            'pool',
            'mgw_name',
            'vendor_rnc',
            'spc_nat0',
            'trunk_name',
            'rnc_location',
            'status',
            'log_date',
            'remark:ntext',
        ],
    ]) ?>

    <p align = right>
        <?= Html::a('Update', ['update', 'rnc_id' => $model->rnc_id, 'mgw_name' => $model->mgw_name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'rnc_id' => $model->rnc_id, 'mgw_name' => $model->mgw_name], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
