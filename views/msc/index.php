<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MscSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'MSC List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msc-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p align = right>
        <?= Html::a('Manage MSC', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'msc_name',
            'cnid',
            //'dummy_number',
            'pool:ntext',
            // 'non_broadcast_lai',
            // 'null_nri',
            // 'nri_msc',
            'spc_msc',
            // 'cap_value',
            // 'nb_lai',
            //'msc_index',
            // 'msc_IP_sigtran1',
            // 'msc_IP_sigtran2',
            // 'mgw_proxyA_flex',
            // 'mgw_managerA_circuit',
            // 'status',
            // 'log_date',
            // 'remark:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
