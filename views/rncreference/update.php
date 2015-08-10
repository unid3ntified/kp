<?php

use yii\helpers\Html;
use app\controllers\RncreferenceController;

/* @var $this yii\web\View */
/* @var $model app\models\RncReference */

$this->title = 'Update Rnc Reference: ' . ' ' . $model->rnc_name;
$this->params['breadcrumbs'][] = ['label' => 'Rnc References', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rnc_name, 'url' => ['view', 'rnc_name' => $model->rnc_name, 'mgw_name' => $model->mgw_name]];
$this->params['breadcrumbs'][] = 'Update';
RncreferenceController::convertDropDown($model);
?>
<div class="rnc-reference-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listRnc' => $listRnc,
        'listMgw' => $listMgw,
        'option' => $option,
    ]) ?>

</div>
