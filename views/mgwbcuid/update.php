<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MgwBcuId */

$this->title = 'Update Mgw Bcu Id: ' . ' ' . $model->mgw_name;
$this->params['breadcrumbs'][] = ['label' => 'Mgw Bcu Ids', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mgw_name, 'url' => ['view', 'id' => $model->mgw_name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mgw-bcu-id-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
