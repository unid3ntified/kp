<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SpcRansharing */

$this->title = 'Create Spc Ransharing';
$this->params['breadcrumbs'][] = ['label' => 'Spc Ransharings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spc-ransharing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
