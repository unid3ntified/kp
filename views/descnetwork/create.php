<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DescNetwork */

$this->title = 'Assign OPC';
$this->params['breadcrumbs'][] = ['label' => 'OPC List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="desc-network-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listData' => $listData,
        'err' => $err,
    ]) ?>

</div>
