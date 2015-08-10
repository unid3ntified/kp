<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RncReferenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'RNC References';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rnc-reference-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <div class="col-sm-4" align=left>
            <br>
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>
            <?= $form->field($searchModel, 'search', ['inputOptions' => ['size' => '30']])?>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-sm-4" align=center>
            <h4>
                <?php
                    $filename = 'RNC_filtered_'.date('Y-m-d');
                    echo 'Download Table: '.ExportMenu::widget([
                        'dataProvider' => $downloadProvider,
                        'filename' => $filename,
                    ]);
                ?>
            </h4>
        </div>
        <div class="col-sm-4" align=right>
            <h4><?= Html::a('Create New', ['create'], ['class' => 'btn btn-success']) ?></h4>
        </div>
    </div>

     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            ['attribute'=>'rnc_id',
                'value' => function ($model, $key, $index) { 
                    return $model->rnc_id;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search RNC id here', ],

            ],

            ['attribute'=>'mgw_name',
                'value' => function ($model, $key, $index) { 
                    return $model->mgw_name;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search MGW here'],
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

            ['attribute'=>'spc_nat0',
                'value' => function ($model, $key, $index) { 
                    return $model->spc_nat0;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search spc nat0 here'],
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
