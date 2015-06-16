<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BcuId */

$this->title = $model->mgw_name;
$this->params['breadcrumbs'][] = ['label' => 'Bcu Ids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcu-id-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mgw_name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mgw_name], [
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
            'mgw_name',
            'new_mss_connected',
            'old_mss_connected',
            'region',
            'location:ntext',
            'status',
            'log_date',
            'remark:ntext',
        ],
    ]) ?>

</div>
