<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RncReferenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'RNC References';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rnc-reference-index">

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


        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            ['attribute'=>'rnc_id',
                'value' => function ($model, $key, $index) { 
                    return $model->rnc_id;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search RNC id here', ],

            ],

            ['attribute'=>'pool',
                'value' => function ($model, $key, $index) { 
                    return $model->pool;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search pool here'],
            ],

             ['attribute'=>'trunk_name',
                'value' => function ($model, $key, $index) { 
                    return $model->trunk_name;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search trunk name here'],
            ],

            ['attribute'=>'rnc_location',
                'value' => function ($model, $key, $index) { 
                    return $model->rnc_location;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search RNC location here'],
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
    ?>

</div>
