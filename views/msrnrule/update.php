<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MsrnRule */

$this->title = 'Update Msrn Rule: ' . ' ' . $model->cmn;
$this->params['breadcrumbs'][] = ['label' => 'Msrn Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cmn, 'url' => ['view', 'cmn' => $model->cmn, 'new_msrn' => $model->new_msrn]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="msrn-rule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
