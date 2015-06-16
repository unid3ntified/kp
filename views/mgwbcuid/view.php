<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MgwBcuId */

$this->title = $model->mgw_name;
$this->params['breadcrumbs'][] = ['label' => 'Mgw Bcu Ids', 'url' => ['index', 'mgw_name' => $model->mgw_name]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mgw-bcu-id-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'bcu_id' => $model->bcu_id, 'mgw_name' => $model->mgw_name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'bcu_id' => $model->bcu_id, 'mgw_name' => $model->mgw_name], [
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
            'bcu_id',
            'old_mss_connected',
            'new_mss_connected',
        ],
    ]) ?>

</div>
