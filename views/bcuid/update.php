<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BcuId */

$this->title = 'Update Bcu Id: ' . ' ' . $model->name_mgw;
$this->params['breadcrumbs'][] = ['label' => 'Bcu Ids', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name_mgw, 'url' => ['view', 'id' => $model->name_mgw]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bcu-id-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'option' => $option,
    ]) ?>

</div>
