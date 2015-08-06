<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MsrnProposedlist */

$this->title = 'Create Msrn Proposedlist';
$this->params['breadcrumbs'][] = ['label' => 'Msrn Proposed List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msrn-proposedlist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
