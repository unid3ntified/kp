<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MsrnRule */

$this->title = 'Create Msrn Rule';
$this->params['breadcrumbs'][] = ['label' => 'Msrn Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msrn-rule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
