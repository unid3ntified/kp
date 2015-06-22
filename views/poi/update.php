<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Poi */

$this->title = 'Update Poi: ' . ' ' . $model->poi;
$this->params['breadcrumbs'][] = ['label' => 'Poi List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->poi, 'url' => ['view', 'id' => $model->poi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="poi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
