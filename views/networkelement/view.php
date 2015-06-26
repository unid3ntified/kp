<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
//use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NetworkElement */

$this->title = $model->network_element_id;
$this->params['breadcrumbs'][] = ['label' => 'Network Element List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="network-element-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (!$flag)
        {
            echo "<p align=right>";
            echo Html::a('Assign BCU', ['/bcuid/index'], ['class' => 'btn btn-primary']).' '.Html::a('Manage MSC', ['/msc/index'], ['class' => 'btn btn-primary']);
            echo "</p>";
        }
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'network_element_id',
            'gt_address',
            'location:ntext',
            'provinsi',
            'vendor',
            'gtt',
            'status',
            'log_date',
            'remark:ntext',
        ],
    ]) ?>

    <p align = right>
        <?= Html::a('Update', ['update', 'id' => $model->network_element_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->network_element_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <h3><?= Html::encode('OPC List') ?></h3>   
    <?= GridView::widget([
        'dataProvider' => $OpcDataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'opc_nat0',
            'opc_nat1',
            'desc_network:ntext',
            'inat0',
            'second_opc',
            'third_opc',
            'fourth_opc',
            'fifth_opc',
            'sixth_opc',

        ],
    ]); ?> 

    <p align=right>
        <?= Html::a('Assign OPC', ['/descnetwork/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <h3><?= Html::encode($flag) ?></h3>
    <?php
        if ($flag == 'MSC Specification')
        {
            echo DetailView::widget([
                'model' => $mscmodel,
                'attributes' => [
                    'cnid',
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
                ],
            ]);
            echo "<p align=right>";
            echo Html::a('Manage MSC', ['/msc/index'], ['class' => 'btn btn-primary']);
            echo "</p>";
        } 
        else if ($flag == 'BCU ID List')
        {
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'bcu_id',
                    //'mgw_name',
                    'region',
                    'old_mss_connected',
                    'new_mss_connected',
                ],
            ]);
            echo "<p align=right>";
            echo Html::a('Assign BCU', ['/bcuid/index'], ['class' => 'btn btn-primary']);
            echo "</p>";
        }

        
        if ($flag == 'MSC Specification' || $flag == 'BCU ID List')
        {
            echo "<h3>Trunk VOIP List</h3>";
            echo GridView::widget([
                'dataProvider' => $TVDataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'trunk_id',
                    'detail:ntext',
                    'direction',
                    'konfigurasi:ntext',
                    'partner',
                    'e1',
                    'opc_mss',
                    'dpc',
                    'voip_gateway',
                ],
            ]);

            echo "<p align=right>";
            echo Html::a('Assign Trunk VOIP', ['/trunkvoip/index'], ['class' => 'btn btn-primary']);
            echo "</p>";

            echo "<h3>RNC Reference</h3>"; 
            echo GridView::widget([
                'dataProvider' => $RncDataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'rnc_id',
                    //'mgw_name',
                    'pool',
                    'trunk_name',
                    'rnc_location',
                ],
            ]);

            echo "<p align=right>";
            echo Html::a('Assign RNC', ['/rncreference/index'], ['class' => 'btn btn-primary']);
            echo "</p>";
        }     
    ?><br>

</div>
