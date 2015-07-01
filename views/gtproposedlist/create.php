<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GtProposedlist */

$this->title = 'Create Gt Proposedlist';
$this->params['breadcrumbs'][] = ['label' => 'Gt Proposedlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gt-proposedlist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
