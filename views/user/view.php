<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Admin List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'username',
            //'password_hash',
            //'password_reset_token',
            //'auth_key',
            'email:email',
            //'status',
            'created_at',
            'updated_at',
            //'Phone',
        ],
    ]) ?>

</div>
