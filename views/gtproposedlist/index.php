<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GtProposedlistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'GT Proposed List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gt-proposedlist-index">

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
                    $filename = 'GTProposedList_filtered_'.date('Y-m-d');
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

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'Regional',
                'value' => function ($model, $key, $index) { 
                    return $model->Regional;
                },
               //'options' => ['style' => 'width:10%;'],
                'format'=>'raw',
            ],

            ['attribute'=>'MSS',
                'value' => function ($model, $key, $index) { 
                    return $model->MSS;
                },
                //'options' => ['style' => 'width:20%;'],
                'format'=>'raw',
            ],

            ['attribute'=>'Vendor',
                'value' => function ($model, $key, $index) { 
                    return $model->Vendor;
                },
                //'options' => ['style' => 'width:10%;'],
                'format'=>'raw',
            ],

            ['attribute'=>'GT',
                'value' => function ($model, $key, $index) { 
                    return $model->GT;
                },
                //'options' => ['style' => 'width:20%;'],
                'format'=>'raw',
            ],

            ['attribute'=>'new_GT',
                'value' => function ($model, $key, $index) { 
                    return $model->new_GT;
                },
                //'options' => ['style' => 'width:20%;'],
                'format'=>'raw',
            ],

            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); 
    ?>

</div>
