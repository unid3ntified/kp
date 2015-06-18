<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DescNetwork */

$this->title = $model->network_id;
$this->params['breadcrumbs'][] = ['label' => 'OPCs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="desc-network-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            //'id',
            'network_id',
            'opc_nat0',
            'opc_nat1',
            'desc_network:ntext',
            'inat0',
            'second_opc',
            'third_opc',
            'fourth_opc',
            'fifth_opc',
            'sixth_opc',
        ],
    ]) ?>

</div>
