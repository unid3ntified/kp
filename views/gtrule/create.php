<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GtRule */

$this->title = 'Create Gt Rule';
$this->params['breadcrumbs'][] = ['label' => 'Gt Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gt-rule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
