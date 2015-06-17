<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MgwBcuIdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bcu Id list for '.$mgw_name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mgw-bcu-id-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Assign Mgw to Bcu ID', ['create', 'mgw_name' => $mgw_name], ['class' => 'btn btn-success']) ?>
        <?= Html::a('MGW list', ['bcuid/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mgw_name',
            'bcu_id',
            'old_mss_connected',
            'new_mss_connected',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
