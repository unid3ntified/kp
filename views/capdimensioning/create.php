<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CapDimensioning */

$this->title = 'Create Cap Dimensioning';
$this->params['breadcrumbs'][] = ['label' => 'Cap Dimensionings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cap-dimensioning-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listData' => $listData,
    ]) ?>

</div>
