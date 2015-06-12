<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TrunkInterkoneksi */

$this->title = $model->trunk;
$this->params['breadcrumbs'][] = ['label' => 'Trunk Interkoneksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trunk-interkoneksi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->trunk], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->trunk], [
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
            'trunk',
            'partner:ntext',
            'poi',
            'connection:ntext',
            'direction',
            'vendor',
            'mss',
            'mgw',
            'opc',
            'dpc',
            'e1_capacity',
            'status',
            'log_date',
            'remark:ntext',
        ],
    ]) ?>

</div>
