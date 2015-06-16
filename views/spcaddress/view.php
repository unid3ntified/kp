<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SpcAddress */

$this->title = $model->network_id;
$this->params['breadcrumbs'][] = ['label' => 'Spc Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spc-address-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->network_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->network_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'network_id',
            'desc_network:ntext',
            'location:ntext',
            'provinsi',
            'vendor',
            'gtt',
            'second_OPC',
            'third_OPC',
            'fourth_OPC',
            'fifth_OPC',
            'sixth_OPC',
            'INAT0',
            'status',
            'log_date',
            'remark:ntext',
        ],
    ]) ?>

</div>
