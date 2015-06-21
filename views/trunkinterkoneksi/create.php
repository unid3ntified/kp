<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TrunkInterkoneksi */

$this->title = 'Create Trunk Interkoneksi';
$this->params['breadcrumbs'][] = ['label' => 'Trunk Interkoneksi List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trunk-interkoneksi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
