<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrunkInterkoneksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Interconnection Trunk List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trunk-interkoneksi-index">

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
            
            ['attribute'=>'trunk_id',
                'value' => function ($model, $key, $index) { 
                    return $model->trunk_id;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search trunk id here', ],
            ],
            ['attribute'=>'opc',
                'value' => function ($model, $key, $index) { 
                    return $model->opc;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search OPC here'],
            ],
            ['attribute'=>'dpc',
                'value' => function ($model, $key, $index) { 
                    return $model->dpc;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search DPC here'],
            ],
            ['attribute'=>'POI',
                'value' => function ($model, $key, $index) { 
                    return $model->POI;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search POI here'],
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
    ?>

</div>
