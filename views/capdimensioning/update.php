<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CapDimensioning */

$this->title = 'Update Cap Dimensioning: ' . ' ' . $model->node_id;
$this->params['breadcrumbs'][] = ['label' => 'Cap Dimensionings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->node_id, 'url' => ['view', 'id' => $model->node_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cap-dimensioning-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listData' => $listData,
    ]) ?>

</div>
