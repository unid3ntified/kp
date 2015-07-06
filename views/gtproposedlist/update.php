<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GtProposedlist */

$this->title = 'Update GT Proposed List: ' . ' ' . $model->MSS;
$this->params['breadcrumbs'][] = ['label' => 'GT Proposed List', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gt-proposedlist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
