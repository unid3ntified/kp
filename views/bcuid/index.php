<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BcuIdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bcu Ids';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcu-id-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bcu Id', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name_mgw',
            'pool:ntext',
            'vendor',
            'provinsi',
            'location:ntext',
            // 'bcu_id',
            // 'status',
            // 'log_date',
            // 'remark:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>