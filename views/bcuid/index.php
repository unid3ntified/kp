<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BcuIdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'MGW List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcu-id-index">

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
                    $filename = 'MGW_filtered_'.date('Y-m-d');
                    echo 'Download Table: '.ExportMenu::widget([
                        'dataProvider' => $downloadProvider,
                        'filename' => $filename,
                    ]);
                ?>
            </h4>
        </div>
        <div class="col-sm-4" align=right>
            <h4><?= Html::a('Manage MGW', ['create'], ['class' => 'btn btn-success']) ?></h4>
        </div>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,

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

            'pool',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
    ?>

</div>
