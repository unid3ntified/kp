<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SpcAddress */

$this->title = 'Create Spc Address';
$this->params['breadcrumbs'][] = ['label' => 'Spc Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spc-address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
