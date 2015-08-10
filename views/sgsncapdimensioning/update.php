<?php

use yii\helpers\Html;
use app\controllers\SgsncapdimensioningController;

/* @var $this yii\web\View */
/* @var $model app\models\SgsnCapDimensioning */

$this->title = 'Update SGSN Capacity Dimensioning: ' . ' ' . $model->node_name;
$this->params['breadcrumbs'][] = ['label' => 'SGSN Capacity Dimensionings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->node_name, 'url' => ['view', 'id' => $model->node_name]];
$this->params['breadcrumbs'][] = 'Update';
SgsncapdimensioningController::convertDropDown($model);
?>
<div class="sgsn-cap-dimensioning-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listSgsn' => $listSgsn,
    ]) ?>

</div>
