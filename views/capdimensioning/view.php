<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CapDimensioning */

$this->title = $model->node_id;
$this->params['breadcrumbs'][] = ['label' => 'Cap Dimensionings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cap-dimensioning-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->node_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->node_id], [
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
            'node_id',
            'region',
            'hw_type',
            'software_release',
            'subs_capacity',
            'erlang_capacity',
            'bhca_capacity',
        ],
    ]) ?>

</div>
