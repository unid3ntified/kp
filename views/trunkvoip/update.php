<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrunkVoip */

$this->title = 'Update Trunk Voip: ' . ' ' . $model->trunk;
$this->params['breadcrumbs'][] = ['label' => 'Trunk Voips', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->trunk, 'url' => ['view', 'id' => $model->trunk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trunk-voip-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'option' => $option,
    ]) ?>

</div>
