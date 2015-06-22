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

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->network_element_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->network_element_id], [
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
            'network_element_id',
            'gt_address',
            'location:ntext',
            'provinsi',
            'vendor',
            'gtt',
            //'inat0',
            'status',
            'log_date',
            'remark:ntext',
        ],
    ]) ?>
    <br>
    <h3><?= Html::encode('OPC List') ?></h3>
   
    <?= GridView::widget([
        'dataProvider' => $OpcDataProvider,
        //'filterModel' => $OpcSearchModel,
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
        <?= Html::a('Assign OPC', ['/descnetwork/create'], ['class' => 'btn btn-primary']) ?>
    </p>


    <h3><?= Html::encode($flag) ?></h3>
    <?php 
        if ($flag == 'MSC Spec')
        {
            echo DetailView::widget([
                //'dataProvider' => $dataProvider,
                //'filterModel' => $OpcSearchModel,
                'model' => $mscmodel,
                'attributes' => [
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

                ],
            ]);

            echo "<p align=right>";
            echo Html::a('Assign BCU', ['/msc/create'], ['class' => 'btn btn-primary']);
            echo "</p>";
        } 
        else if ($flag == 'BCU ID List')
        {
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $OpcSearchModel,
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
            echo Html::a('Assign BCU', ['/bcuid/create'], ['class' => 'btn btn-primary']);
            echo "</p>";
        }
    ?><br>

</div>
