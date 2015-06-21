<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Msc */

$this->title = 'Update Msc: ' . ' ' . $model->msc_name;
$this->params['breadcrumbs'][] = ['label' => 'Mscs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->msc_name, 'url' => ['view', 'id' => $model->msc_name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="msc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listData' => $listData,
        'option' => $option,
    ]) ?>

</div>