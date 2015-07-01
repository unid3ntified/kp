<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MsrnRouting */

$this->title = 'Create Msrn Routing';
$this->params['breadcrumbs'][] = ['label' => 'Msrn Routings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msrn-routing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
