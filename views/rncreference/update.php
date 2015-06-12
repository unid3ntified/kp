<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RncReference */

$this->title = 'Update Rnc Reference: ' . ' ' . $model->msc_name;
$this->params['breadcrumbs'][] = ['label' => 'Rnc References', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->msc_name, 'url' => ['view', 'id' => $model->msc_name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rnc-reference-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
