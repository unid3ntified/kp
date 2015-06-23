<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BcuId */

$this->title = $model->bcu_id;
$this->params['breadcrumbs'][] = ['label' => 'Bcu Ids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcu-id-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'bcu_id',
            'mgw_name',
            'region',
            'old_mss_connected',
            'new_mss_connected',
            'status',
            'log_date',
            'remark:ntext',
        ],
    ]) ?>

     <p align = right>
        <?= Html::a('Update', ['update', 'id' => $model->bcu_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->bcu_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
