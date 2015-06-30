<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\NetworkElement;
use kartik\export\ExportMenu;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $searchModel app\models\NetworkElementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Network Element List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="network-element-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-sm-6" align=left>
            <br>
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>
            <?= $form->field($searchModel, 'search', ['inputOptions' => ['size' => '30']])?>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-sm-6" align=right>        
            <h4>
                <?php
                    echo 'Download Table: '.ExportMenu::widget([
                        'dataProvider' => $dataProvider,
                    ]).' '.Html::a('Create New', ['create'], ['class' => 'btn btn-success']) ;
                ?>
            </h4>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
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


