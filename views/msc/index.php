<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MscSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'MSC List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msc-index">

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
            <h4><?= Html::a('Manage MSC', ['create'], ['class' => 'btn btn-success']) ?></h4>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            ['attribute'=>'msc_name',
                'value' => function ($model, $key, $index) { 
                    return $model->msc_name;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search MSC name here', ],

            ],

            ['attribute'=>'cnid',
                'value' => function ($model, $key, $index) { 
                    return $model->cnid;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search CN id here'],
            ],

            ['attribute'=>'pool',
                'value' => function ($model, $key, $index) { 
                    return $model->pool;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search pool here'],
            ],

            ['attribute'=>'spc_msc',
                'value' => function ($model, $key, $index) { 
                    return $model->spc_msc;
                },
                'format'=>'raw',
                'filterInputOptions' => ['placeholder' => 'Search SPC MSC here'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
    ?>
</div>
