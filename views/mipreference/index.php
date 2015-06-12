<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MipReferenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mip References';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mip-reference-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mip Reference', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name_msc',
            'nri_msc',
            'nri',
            'null_nri',
            'non_broadcastLAI',
            // 'cnid',
            // 'cap_value',
            // 'status',
            // 'log_date',
            // 'remark:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
