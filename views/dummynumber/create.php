<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DummyNumber */

$this->title = 'Create Dummy Number';
$this->params['breadcrumbs'][] = ['label' => 'Dummy Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dummy-number-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'option' => $option,
    ]) ?>

</div>
