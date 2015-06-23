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
</div>
