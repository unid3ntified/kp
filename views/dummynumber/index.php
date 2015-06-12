<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DummyNumberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dummy Numbers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dummy-number-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dummy Number', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name_msc',
            'trunk_group',
            'dummy_number',
            'status',
            'log_date',
            // 'remark:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
