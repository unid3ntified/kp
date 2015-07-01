<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SctPortHuawei */

$this->title = 'Create Sct Port Huawei';
$this->params['breadcrumbs'][] = ['label' => 'Sct Port Huaweis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sct-port-huawei-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
