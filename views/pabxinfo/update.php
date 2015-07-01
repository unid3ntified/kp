<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PabxInfo */

$this->title = 'Update Pabx Info: ' . ' ' . $model->No;
$this->params['breadcrumbs'][] = ['label' => 'Pabx Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->No, 'url' => ['view', 'id' => $model->No]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pabx-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
