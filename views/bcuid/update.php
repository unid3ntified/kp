<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BcuId */

$this->title = 'Update Bcu Id: ' . ' ' . $model->bcu_id;
$this->params['breadcrumbs'][] = ['label' => 'Bcu Ids', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bcu_id, 'url' => ['view', 'id' => $model->bcu_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bcu-id-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listData' => $listData,
        'option' => $option,
    ]) ?>

</div>
