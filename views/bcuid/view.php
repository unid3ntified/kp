<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BcuId */

$this->title = $model->name_mgw;
$this->params['breadcrumbs'][] = ['label' => 'Bcu Ids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcu-id-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->name_mgw], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->name_mgw], [
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
            'name_mgw',
            'pool:ntext',
            'vendor',
            'provinsi',
            'location:ntext',
            'bcu_id',
            'status',
            'log_date',
            'remark:ntext',
        ],
    ]) ?>

</div>
