<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SgsnCapDimensioningSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'SGSN Capacity Dimensionings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgsn-cap-dimensioning-index">

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
                    $filename = 'TrunkVOIP_filtered_'.date('Y-m-d');
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
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'node_name',
            'site_name',
            //'technology_type',
            //'vendor',
            'hardware_version',
            'software_level',
            'cap_max_sau',
            'cap_max_pdp',
            'cap_used_sau',
            'cap_used_pdp',
            // 'cap_used_sau_percent',
            // 'cap_used_pdp_percent',
            // 'cpu_utilisation_percent',
            // 'memory_utilisation_percent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
