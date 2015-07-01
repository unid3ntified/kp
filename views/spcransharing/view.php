<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SpcRansharing */

$this->title = $model->No;
$this->params['breadcrumbs'][] = ['label' => 'Spc Ransharings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spc-ransharing-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->No], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->No], [
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
            'No',
            'SPC',
        ],
    ]) ?>

</div>
