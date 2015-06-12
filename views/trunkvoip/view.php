<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TrunkVoip */

$this->title = $model->trunk;
$this->params['breadcrumbs'][] = ['label' => 'Trunk Voips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trunk-voip-view">

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
            'voip_gateway',
            'connection',
            'direction',
            'vendor',
            'mss',
            'mgw',
            'ip_partner',
            'ip_xl',
            'ip_realm',
            'sa_name',
            'e1_capacity',
            'status',
            'log_date',
            'remark:ntext',
        ],
    ]) ?>

</div>
