<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SctPortHuaweiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sct Port Huawei';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sct-port-huawei-index">

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
            ['attribute'=>'mss_huawei',
                'value' => function ($model, $key, $index) { 
                    return $model->mss_huawei;
                },
               //'options' => ['style' => 'width:10%;'],
                'format'=>'raw',
            ],

            ['attribute'=>'sctp_port',
                'value' => function ($model, $key, $index) { 
                    return $model->sctp_port;
                },
                //'options' => ['style' => 'width:20%;'],
                'format'=>'raw',
            ],

            ['attribute'=>'last_counter',
                'value' => function ($model, $key, $index) { 
                    return $model->last_counter;
                },
                //'options' => ['style' => 'width:10%;'],
                'format'=>'raw',
            ],

            ['attribute'=>'Remark',
                'value' => function ($model, $key, $index) { 
                    return $model->Remark;
                },
                //'options' => ['style' => 'width:20%;'],
                'format'=>'raw',
            ],

            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); 
    ?>

</div>
