<?php

use yii\helpers\Html;
use app\controllers\BcuidController;

/* @var $this yii\web\View */
/* @var $model app\models\BcuId */

$this->title = 'Update Bcu Id: ' . ' ' . $model->bcu_id;
$this->params['breadcrumbs'][] = ['label' => 'MGW List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bcu_id, 'url' => ['view', 'id' => $model->bcu_id]];
$this->params['breadcrumbs'][] = 'Update';
BcuidController::convertDropDown($model);
?>
<div class="bcu-id-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listData' => $listData,
    ]) ?>

</div>
