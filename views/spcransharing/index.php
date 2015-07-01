<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpcRansharingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Spc Ransharings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spc-ransharing-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Spc Ransharing', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'No',
            'SPC',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
