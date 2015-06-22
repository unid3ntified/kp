<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NetworkElement */

$this->title = 'Update Network Element: ' . ' ' . $model->network_id;
$this->params['breadcrumbs'][] = ['label' => 'Network Element List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->network_id, 'url' => ['view', 'id' => $model->network_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="network-element-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
