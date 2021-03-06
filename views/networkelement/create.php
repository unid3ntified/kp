<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NetworkElement */

$this->title = 'Create Network Element';
$this->params['breadcrumbs'][] = ['label' => 'Network Element List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="network-element-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
