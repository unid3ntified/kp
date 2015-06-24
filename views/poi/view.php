<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Poi */

$this->title = $model->poi;
$this->params['breadcrumbs'][] = ['label' => 'Poi List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'poi',
            'msc_name',
            'address:ntext',
            'MSRN',
            'dummy_number',
            'log_date',
            'remark:ntext',
        ],
    ]) ?>

    <p align = right>
        <?= Html::a('Update', ['update', 'id' => $model->poi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->poi], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <h3><?= Html::encode('Trunk Interkoneksi List') ?></h3>
   
    <?= GridView::widget([
        'dataProvider' => $TIDataProvider,
        //'filterModel' => $OpcSearchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'trunk_id',
            'direction',
            'vendor',
            'opc',
            'dpc',
            'e1_capacity',
            'POI',
            'connection:ntext',
            't_group',
        ],
    ]); ?> 
    <p align=right>
        <?= Html::a('Create Trunk', ['/trunkinterkoneksi/create'], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
