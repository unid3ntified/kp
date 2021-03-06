<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MsrnRouting */

$this->title = 'Update Msrn Routing: ' . ' ' . $model->No;
$this->params['breadcrumbs'][] = ['label' => 'Msrn Routing', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="msrn-routing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
