<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SpcAddress */

$this->title = $model->network_element;
$this->params['breadcrumbs'][] = ['label' => 'Spc Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spc-address-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->network_element], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->network_element], [
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
            'network_element',
            'pool:ntext',
            'location:ntext',
            'provinsi',
            'vendor',
            'sc_address',
            'gtt',
            'opc_nat1',
            'opc_nat0',
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
