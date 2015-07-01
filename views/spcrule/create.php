<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SpcRule */

$this->title = 'Create Spc Rule';
$this->params['breadcrumbs'][] = ['label' => 'Spc Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spc-rule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
