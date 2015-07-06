<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MsrnRuleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Msrn Rules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msrn-rule-index">

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
                    ]);
                ?>
            </h4>
        </div>
    </div>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'cmn',
                'value' => function ($model, $key, $index) { 
                    return $model->cmn;
                },
               //'options' => ['style' => 'width:10%;'],
                'format'=>'raw',
            ],

            ['attribute'=>'area',
                'value' => function ($model, $key, $index) { 
                    return $model->area;
                },
                //'options' => ['style' => 'width:20%;'],
                'format'=>'raw',
            ],

            ['attribute'=>'equipment',
                'value' => function ($model, $key, $index) { 
                    return $model->equipment;
                },
                //'options' => ['style' => 'width:10%;'],
                'format'=>'raw',
            ],

            ['attribute'=>'new_msrn',
                'value' => function ($model, $key, $index) { 
                    return $model->new_msrn;
                },
                //'options' => ['style' => 'width:20%;'],
                'format'=>'raw',
            ],

            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); 
    ?>

</div>
