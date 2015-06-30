<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrunkVoipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'VOIP Trunk List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trunk-voip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

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
                <?= 'Download Table: '.ExportMenu::widget([
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
                'filterInputOptions' => ['placeholder' => 'Search trunk id here', 'size' => '10'],

            ],

            ['attribute'=>'mgw',
                'value' => function ($model, $key, $index) { 
                    return $model->mgw;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search MGW here'],
            ],

             ['attribute'=>'mss',
                'value' => function ($model, $key, $index) { 
                    return $model->mss;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search MSS here'],
            ],

            ['attribute'=>'opc_mss',
                'value' => function ($model, $key, $index) { 
                    return $model->opc_mss;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search OPC MSS here'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
    ?>

</div>
