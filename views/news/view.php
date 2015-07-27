<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <div class="row">
        <div class="col-lg-8 col-md-offset-2">
            <div class="row" id="newsimage" align="center">
                <?= Html::img(['/file','id'=>$model->image_id]) ?>
                <br>
            </div>
            <div class="row" id="newstitle" align="center">
                <h2><?= $model->title ?></h2>
                <hr>
            </div>
            <div class="row" id="newscontent">
                <h4><?= $model->news_desc ?></h4>
                <br>
                <hr>
            </div>
    
            <div class="row" id="newsbutton" align=right>
                <br>
                <?php
                    if (!Yii::$app->user->isGuest)
                    {
                        echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
                        echo ' ';
                        echo Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ?>
            </div>
        </div>
    </div>
</div>
