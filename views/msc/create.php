<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Msc */

$this->title = 'Manage Msc';
$this->params['breadcrumbs'][] = ['label' => 'Msc List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listData' => $listData,
    ]) ?>

</div>
