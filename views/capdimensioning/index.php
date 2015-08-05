<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CapDimensioningSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Capacity Dimensionings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cap-dimensioning-index">

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
                    $filename = 'CapacityDimensioning_filtered_'.date('Y-m-d');
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

            'node_id',
            [
                'attribute' => 'location',
                'value' => 'node.location'
            ],
            'region',
            'hw_type',
            'software_release',
            'subs_capacity',
            'erlang_capacity',
            'bhca_capacity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
