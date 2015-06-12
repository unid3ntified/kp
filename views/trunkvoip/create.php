<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TrunkVoip */

$this->title = 'Create Trunk Voip';
$this->params['breadcrumbs'][] = ['label' => 'Trunk Voips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trunk-voip-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'option' => $option,
    ]) ?>

</div>
