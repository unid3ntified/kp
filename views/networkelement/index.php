<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NetworkElementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Network Element List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="network-element-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="panel panel-green" align = right>
    <h4>
        <?php
            echo 'Download Table: '.ExportMenu::widget([
                'dataProvider' => $dataProvider,
            ]).' '.Html::a('Create New', ['create'], ['class' => 'btn btn-success']) ;
        ?>
    </h4>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterRowOptions' => ['class' => 'filters', 'placeholder' => 'Search', 'value' => 'Search'],
        'columns' => [
            //'header' => '<div style="width:150pk;"></div>',
            ['class' => 'yii\grid\SerialColumn'],
            'network_element_id',
            //['value' => , 'contentOptions'=>['style'=>'max-width: 100px;']],
            'gt_address',
            'location:ntext',
            //'provinsi',
            //'vendor',
            'gtt',
            // 'status',
            // 'log_date',
            // 'remark:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
</div>


