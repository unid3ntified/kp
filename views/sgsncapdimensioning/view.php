<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SgsnCapDimensioning */

$this->title = $model->node_name;
$this->params['breadcrumbs'][] = ['label' => 'SGSN Capacity Dimensionings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgsn-cap-dimensioning-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->node_name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->node_name], [
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
            'node_name',
            'site_name',
            'technology_type',
            'vendor',
            'hardware_version',
            'software_level',
            'cap_max_sau',
            'cap_max_pdp',
            'cap_used_sau',
            'cap_used_pdp',
            'cap_used_sau_percent',
            'cap_used_pdp_percent',
            'cpu_utilisation_percent',
            'memory_utilisation_percent',
        ],
    ]) ?>

</div>
