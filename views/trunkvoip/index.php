<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrunkVoipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trunk VOIP List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trunk-voip-index">

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

            'trunk_id',
            'mgw',
            'mss',
            'detail:ntext',
            'direction',
            // 'konfigurasi:ntext',
            // 'partner',
            // 'e1',
            'opc_mss',
            'dpc',
            // 'voip_gateway',
            // 'status',
            // 'log_date',
            // 'remark:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
