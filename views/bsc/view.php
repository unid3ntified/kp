<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bsc */

$this->title = $model->bsc_id;
$this->params['breadcrumbs'][] = ['label' => 'Bsc List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bsc-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'bsc_id' => $model->bsc_id, 'mgw' => $model->mgw], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'bsc_id' => $model->bsc_id, 'mgw' => $model->mgw], [
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
            'bsc_id',
            'mgw',
            'msc',
            'trunk_name',
            'year',
            'status',
            'log_date',
            'remark:ntext',
        ],
    ]) ?>

</div>
