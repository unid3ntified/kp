<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SgsnCapDimensioning */

$this->title = 'Create SGSN Capacity Dimensioning';
$this->params['breadcrumbs'][] = ['label' => 'SGSN Capacity Dimensioning', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgsn-cap-dimensioning-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listSgsn' => $listSgsn,
    ]) ?>

</div>
