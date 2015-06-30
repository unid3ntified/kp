<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DescNetworkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'OPC List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="desc-network-index">

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
                    ]).' '.Html::a('Assign OPC', ['create'], ['class' => 'btn btn-success']) ;
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
                'filterInputOptions' => ['placeholder' => 'Search NE id here', ],

            ],

            ['attribute'=>'opc_nat0',
                'value' => function ($model, $key, $index) { 
                    return $model->opc_nat0;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search OPC NAT0 here'],
            ],

            ['attribute'=>'opc_nat1',
                'value' => function ($model, $key, $index) { 
                    return $model->opc_nat1;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search OPC NAT1 here'],
            ],

            ['attribute'=>'second_opc',
                'value' => function ($model, $key, $index) { 
                    return $model->second_opc;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search second OPC here'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
    ?>

</div>
