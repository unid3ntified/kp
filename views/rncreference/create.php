<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RncReference */

$this->title = 'Create Rnc Reference';
$this->params['breadcrumbs'][] = ['label' => 'Rnc References', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rnc-reference-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'option' => $option,
    ]) ?>

</div>
