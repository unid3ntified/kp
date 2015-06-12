<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrunkInterkoneksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trunk Interkoneksis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trunk-interkoneksi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Trunk Interkoneksi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'trunk',
            'partner:ntext',
            'poi',
            'connection:ntext',
            'direction',
            // 'vendor',
            // 'mss',
            // 'mgw',
            // 'opc',
            // 'dpc',
            // 'e1_capacity',
            // 'status',
            // 'log_date',
            // 'remark:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
