<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RncReference */

$this->title = $model->rnc_name;
$this->params['breadcrumbs'][] = ['label' => 'Rnc References', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rnc-reference-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'rnc_name' => $model->rnc_name, 'mgw_name' => $model->mgw_name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'rnc_name' => $model->rnc_name, 'mgw_name' => $model->mgw_name], [
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
            'rnc_name',
            'msc_name',
            'mgw_name',
            'vendor_rnc',
            'spc_nat0',
            'trunk_name',
            'rnc_location',
            'status',
            'log_date',
            'remark:ntext',
        ],
    ]) ?>

</div>
