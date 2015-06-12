<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrunkVoipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trunk Voips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trunk-voip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Trunk Voip', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'trunk',
            'partner:ntext',
            'voip_gateway',
            'connection',
            'direction',
            // 'vendor',
            // 'mss',
            // 'mgw',
            // 'ip_partner',
            // 'ip_xl',
            // 'ip_realm',
            // 'sa_name',
            // 'e1_capacity',
            // 'status',
            // 'log_date',
            // 'remark:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
