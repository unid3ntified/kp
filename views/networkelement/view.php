<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NetworkElement */

$this->title = $model->network_id;
$this->params['breadcrumbs'][] = ['label' => 'Network Elements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="network-element-view">

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
            'sc_address',
            'location:ntext',
            'provinsi',
            'vendor',
            'gtt',
            'inat0',
            'status',
            'log_date',
            'remark:ntext',
        ],
    ]) ?>

</div>
