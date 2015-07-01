<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GtProposedlist */

$this->title = 'Update Gt Proposedlist: ' . ' ' . $model->No;
$this->params['breadcrumbs'][] = ['label' => 'Gt Proposedlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->No, 'url' => ['view', 'id' => $model->No]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gt-proposedlist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
