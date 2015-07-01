<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MsrnRule */

$this->title = $model->cmn;
$this->params['breadcrumbs'][] = ['label' => 'Msrn Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msrn-rule-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'cmn' => $model->cmn, 'new_msrn' => $model->new_msrn], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'cmn' => $model->cmn, 'new_msrn' => $model->new_msrn], [
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
            'cmn',
            'area',
            'equipment',
            'new_msrn',
            'last_counter',
            'remark',
        ],
    ]) ?>

</div>
