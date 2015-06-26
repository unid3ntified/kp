<?php
use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
	<?php $this->beginBody() ?>
	<div class= "container">
		<div class="row text-center">
			<div class="col-md-12" id="login-title">
				<h1>Sistem Informasi Network Element</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div>
					<?= $content ?>
				</div>
			</div>
		</div>
	</div>
	<?php $this->endBody() ?>
</body>
<?php $this->endPage() ?>