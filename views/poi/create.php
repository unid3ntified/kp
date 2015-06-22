<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Poi */

$this->title = 'Create Poi';
$this->params['breadcrumbs'][] = ['label' => 'Poi List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
