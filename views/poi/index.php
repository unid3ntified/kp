<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PoiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'POI List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poi-index">

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
            
             ['attribute'=>'poi',
                'value' => function ($model, $key, $index) { 
                    return $model->poi;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search POI here', ],
            ],

            ['attribute'=>'msc_name',
                'value' => function ($model, $key, $index) { 
                    return $model->msc_name;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search MSC name here', ],
            ],

            ['attribute'=>'address',
                'value' => function ($model, $key, $index) { 
                    return $model->address;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search address here'],
            ],

            ['attribute'=>'dummy_number',
                'value' => function ($model, $key, $index) { 
                    return $model->dummy_number;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search dummy number here'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
    ?>

</div>
