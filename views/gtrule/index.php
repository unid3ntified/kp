<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GtRuleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gt Rules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gt-rule-index">

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
                    echo 'Download Table: '.ExportMenu::widget([
                        'dataProvider' => $dataProvider,
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
            ['attribute'=>'STP',
                'value' => function ($model, $key, $index) { 
                    return $model->STP;
                },
               'options' => ['style' => 'width:10%;'],
                'format'=>'raw',
            ],

            ['attribute'=>'Area',
                'value' => function ($model, $key, $index) { 
                    return $model->Area;
                },
                'options' => ['style' => 'width:20%;'],
                'format'=>'raw',
            ],

            ['attribute'=>'Equipment',
                'value' => function ($model, $key, $index) { 
                    return $model->Equipment;
                },
                'options' => ['style' => 'width:10%;'],
                'format'=>'raw',
            ],

            ['attribute'=>'GT',
                'value' => function ($model, $key, $index) { 
                    return $model->GT;
                },
                'options' => ['style' => 'width:20%;'],
                'format'=>'raw',
            ],

            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); 
    ?>

</div>
