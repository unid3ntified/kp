<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RncReferenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rnc References';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rnc-reference-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p align = right>
        <?= Html::a('Create New', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'rnc_name',
            'rnc_id',
            'mgw_name',
            //'vendor_rnc',
            'pool',
            'spc_nat0',
            'trunk_name',
            // 'rnc_location',
            // 'status',
            // 'log_date',
            // 'remark:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
