<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MsrnProposedlist */

$this->title = 'Update MSRN Proposed List: ' . ' ' . $model->MSS;
$this->params['breadcrumbs'][] = ['label' => 'MSRN Proposed List', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="msrn-proposedlist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
