<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RncReference */

$this->title = $model->msc_name;
$this->params['breadcrumbs'][] = ['label' => 'Rnc References', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rnc-reference-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->msc_name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->msc_name], [
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
            'msc_name',
            'mgw_name',
            'rnc_name',
            'vendor_rnc',
            'spc_nat0',
            'trunk_name',
            'rnc_description:ntext',
            'rnc_location:ntext',
            'provinsi',
            'status',
            'log_date',
            'remark:ntext',
        ],
    ]) ?>

</div>
