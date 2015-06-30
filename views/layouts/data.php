<?php
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;

AppAsset::register($this);
?>

<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
	<?php $this->beginBody() ?>
	<div id="sidebar">
		<?= Html::a('<div class="sidebar-element text-right">Home</div>', ['site/index']) ?>
		<?= Html::a('<div class="sidebar-element text-right">Dashboard</div>', ['site/data']) ?>
		<?= Html::a('<div class="sidebar-element text-right">Network Element</div>', ['networkelement/index']) ?>
		<?= Html::a('<div class="sidebar-element text-right">Trunk Interkoneksi</div>', ['trunkinterkoneksi/index']) ?>
		<?= Html::a('<div class="sidebar-element text-right">Trunk VOIP</div>', ['trunkvoip/index']) ?>
		<?= Html::a('<div class="sidebar-element text-right">POI</div>', ['poi/index']) ?>
		<?php if (!Yii::$app->user->isGuest) echo Html::a('<div class="sidebar-element text-right">Create Admin</div>', ['site/user'], ['data-method' => 'post']); ?>
		<?php if (!Yii::$app->user->isGuest) echo Html::a('<div class="sidebar-element text-right">Logout</div>', ['site/logout'], ['data-method' => 'post']); ?>
		
	</div>
	<div id="page-wrapper">
		<?= Breadcrumbs::widget([
            'homeLink' => [
                'label' => Yii::t('yii', 'Dashboard'),
                'url' => Yii::$app->homeUrl,
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
		<?= $content ?>
	</div>	
	<?php $this->endBody() ?>
</body>
<?php $this->endPage() ?>
