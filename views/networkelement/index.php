<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\NetworkElement;
use kartik\export\ExportMenu;
use kartik\select2\Select2;


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
        //'filterModel' => Html::activeTextInput($searchModel, 'params', ['placeholder' => 'Search']),
        //'filterRowOptions' => ['class' => 'filters', 'placeholder' => 'Search', 'value' => 'Search'],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            ['attribute'=>'network_element_id',
                'value' => function ($model, $key, $index) { 
                    return $model->network_element_id;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search NE here', ],

            ],

            ['attribute'=>'gt_address',
                'value' => function ($model, $key, $index) { 
                    return $model->gt_address;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search GT address here'],
            ],

            ['attribute'=>'location',
                'value' => function ($model, $key, $index) { 
                    return $model->location;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search location here'],
            ],

            ['attribute'=>'status',
                'value' => function ($model, $key, $index) { 
                    return $model->status;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search status here'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
    ?>
    
</div>


