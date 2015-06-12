<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpcAddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Spc Addresses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spc-address-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Spc Address', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'network_element',
            'pool:ntext',
            'location:ntext',
            'provinsi',
            'vendor',
            // 'sc_address',
            // 'gtt',
            // 'opc_nat1',
            // 'opc_nat0',
            // 'second_OPC',
            // 'third_OPC',
            // 'fourth_OPC',
            // 'fifth_OPC',
            // 'sixth_OPC',
            // 'INAT0',
            // 'status',
            // 'log_date',
            // 'remark:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
