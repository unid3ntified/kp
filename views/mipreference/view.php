<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MipReference */

$this->title = $model->name_msc;
$this->params['breadcrumbs'][] = ['label' => 'Mip References', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mip-reference-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->name_msc], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->name_msc], [
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
            'name_msc',
            'nri_msc',
            'spcAddress.pool',
            'spcAddress.vendor',
            'spcAddress.provinsi',
            'spcAddress.location',
            'spcAddress.sc_address',
            'spcAddress.opc_nat1',
            'nri',
            'null_nri',
            'non_broadcastLAI',
            'cnid',
            'cap_value',
            'status',
            'log_date',
            'remark:ntext',
        ],
    ]) ?>

</div>
