<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DummyNumber */

$this->title = 'Update Dummy Number: ' . ' ' . $model->name_msc;
$this->params['breadcrumbs'][] = ['label' => 'Dummy Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name_msc, 'url' => ['view', 'id' => $model->name_msc]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dummy-number-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'option' => $option,
    ]) ?>

</div>
