<?php

use yii\helpers\Html;
use app\controllers\MscController;

/* @var $this yii\web\View */
/* @var $model app\models\Msc */

$this->title = 'Update Msc: ' . ' ' . $model->msc_name;
$this->params['breadcrumbs'][] = ['label' => 'Msc List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->msc_name, 'url' => ['view', 'id' => $model->msc_name]];
$this->params['breadcrumbs'][] = 'Update';
MscController::convertDropDown($model);
?>
<div class="msc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listData' => $listData,
    ]) ?>

</div>
