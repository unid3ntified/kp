<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MipReference */

$this->title = 'Create Mip Reference';
$this->params['breadcrumbs'][] = ['label' => 'Mip References', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mip-reference-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'option' => $option,
    ]) ?>

</div>
