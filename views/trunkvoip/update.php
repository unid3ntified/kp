<?php

use yii\helpers\Html;
use app\controllers\TrunkvoipController;

/* @var $this yii\web\View */
/* @var $model app\models\TrunkVoip */

$this->title = 'Update Trunk VOIP: ' . ' ' . $model->trunk_id;
$this->params['breadcrumbs'][] = ['label' => 'Trunk VOIP List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->trunk_id, 'url' => ['view', 'id' => $model->trunk_id]];
$this->params['breadcrumbs'][] = 'Update';
TrunkvoipController::convertDropDown($model);
?>
<div class="trunk-voip-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'option' => $option,
        'listMgw' => $listMgw,
		'listMsc' => $listMsc,
    ]) ?>

</div>
