<?php

use yii\helpers\Html;
use app\controllers\BscController;

/* @var $this yii\web\View */
/* @var $model app\models\Bsc */

$this->title = 'Update Bsc: '. $model->bsc_id;
$this->params['breadcrumbs'][] = ['label' => 'Bsc List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bsc_id, 'url' => ['view', 'bsc_id' => $model->bsc_id, 'mgw' => $model->mgw]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bsc-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php 
    	BscController::convertDropDown($model);
    ?>
    <?= $this->render('_form', [
        'model' => $model,
        'listBsc' => $listBsc,
        'listMgw' => $listMgw,
    ]) ?>

</div>
