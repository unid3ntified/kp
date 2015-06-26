<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BcuIdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'MGW List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcu-id-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="panel panel-green" align = right>
    <h4>
        <?php
            echo 'Download Table: '.ExportMenu::widget([
                'dataProvider' => $dataProvider,
            ]).' '.Html::a('Manage MGW', ['create'], ['class' => 'btn btn-success']) ;
        ?>
    </h4>
    </div>

     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,


        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            ['attribute'=>'bcu_id',
                'value' => function ($model, $key, $index) { 
                    return $model->bcu_id;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search BCU id here', ],

            ],

            ['attribute'=>'mgw_name',
                'value' => function ($model, $key, $index) { 
                    return $model->mgw_name;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search MGW name here'],
            ],

            ['attribute'=>'old_mss_connected',
                'value' => function ($model, $key, $index) { 
                    return $model->old_mss_connected;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search old MSS here'],
            ],

            ['attribute'=>'new_mss_connected',
                'value' => function ($model, $key, $index) { 
                    return $model->new_mss_connected;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search new MSS here'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
    ?>

</div>
