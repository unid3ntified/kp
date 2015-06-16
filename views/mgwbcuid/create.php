<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MgwBcuId */

$this->title = 'Create Mgw Bcu Id';
$this->params['breadcrumbs'][] = ['label' => 'Mgw Bcu Ids', 'url' => ['index', 'mgw_name' => $model->mgw_name]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mgw-bcu-id-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
