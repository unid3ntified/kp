<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SctPortHuaweiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sct Port Huaweis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sct-port-huawei-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sct Port Huawei', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'No',
            'mss_huawei',
            'sctp_port',
            'last_counter',
            'Remark:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
