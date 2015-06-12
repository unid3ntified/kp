<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BcuId */

$this->title = 'Create Bcu Id';
$this->params['breadcrumbs'][] = ['label' => 'Bcu Ids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcu-id-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'option' => $option,
    ]) ?>

</div>
