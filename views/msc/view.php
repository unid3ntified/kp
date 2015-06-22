<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Msc */

$this->title = $model->msc_name;
$this->params['breadcrumbs'][] = ['label' => 'Mscs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msc-view">

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
            'cnid',
            //'dummy_number',
            'pool:ntext',
            'non_broadcast_lai',
            'null_nri',
            'nri_msc',
            'spc_msc',
            'cap_value',
            'nb_lai',
            'msc_index',
            'msc_IP_sigtran1',
            'msc_IP_sigtran2',
            'mgw_proxyA_flex',
            'mgw_managerA_circuit',
            'status',
            'log_date',
            'remark:ntext',
        ],
    ]) ?>

</div>
