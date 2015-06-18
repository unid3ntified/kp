<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DescNetworkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'OPCs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="desc-network-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p align = right>
        <?= Html::a('Assign OPC', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'network_id',
            'opc_nat0',
            'opc_nat1',
            //'desc_network:ntext',
            'second_opc',
            'third_opc',
            'fourth_opc',
            // 'fifth_opc',
            // 'sixth_opc',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
