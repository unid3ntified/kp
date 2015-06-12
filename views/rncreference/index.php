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

    <p>
        <?= Html::a('Create Rnc Reference', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'msc_name',
            'mgw_name',
            'rnc_name',
            'vendor_rnc',
            'spc_nat0',
            // 'trunk_name',
            // 'rnc_description:ntext',
            // 'rnc_location:ntext',
            // 'provinsi',
            // 'status',
            // 'log_date',
            // 'remark:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
