<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MipReference */

$this->title = 'Update Mip Reference: ' . ' ' . $model->name_msc;
$this->params['breadcrumbs'][] = ['label' => 'Mip References', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name_msc, 'url' => ['view', 'id' => $model->name_msc]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mip-reference-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
