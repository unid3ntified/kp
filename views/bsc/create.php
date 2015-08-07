<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bsc */

$this->title = 'Create Bsc';
$this->params['breadcrumbs'][] = ['label' => 'Bsc List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bsc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listBsc' => $listBsc,
        'listMgw' => $listMgw,
    ]) ?>

</div>
