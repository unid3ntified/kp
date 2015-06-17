<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MgwBcuId */

$this->title = 'Update Bcu Id: ' . ' ' . $model->bcu_id;
$this->params['breadcrumbs'][] = ['label' => $model->mgw_name, 'url' => ['index', 'mgw_name' => $model->mgw_name]];
$this->params['breadcrumbs'][] = ['label' => $model->bcu_id, 'url' => ['view', 'id' => $model->bcu_id, 'mgw_name' => $model->mgw_name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mgw-bcu-id-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
