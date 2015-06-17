<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BcuIdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'MGW list';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcu-id-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create MGW', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('BCU list (view only)', ['/mgwbcuid/bcuindex'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mgw_name',
            'region',
            'location:ntext',
            'status',
            //'log_date',
            // 'remark:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
