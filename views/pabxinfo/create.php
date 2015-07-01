<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PabxInfo */

$this->title = 'Create Pabx Info';
$this->params['breadcrumbs'][] = ['label' => 'Pabx Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pabx-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
