<?php
use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

/* @var $this yii\web\View */
$this->title = 'Download';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <div class="col-md-9">
 		<div class="panel panel-green">
			<h4>Download Network Element Data:&nbsp;</h4>
			<?php
			echo ExportMenu::widget([
				'dataProvider' => $NEdataProvider,
			]);
			?>
			<hr>	
 		</div>
 	</div>
 	<div class="col-md-9">
 		<div class="panel panel-green">
			<h4>Download OPC Data:&nbsp;</h4>
			<?php
			echo ExportMenu::widget([
				'dataProvider' => $OPCdataProvider,
			]);
			?>
			<hr>	
 		</div>
 	</div>
 	<div class="col-md-9">
 		<div class="panel panel-green">
			<h4>Download MSC Data:&nbsp;</h4>
			<?php
			echo ExportMenu::widget([
				'dataProvider' => $MSCdataProvider,
			]);
			?>
			<hr>	
 		</div>
 	</div>
 	<div class="col-md-9">
 		<div class="panel panel-green">
			<h4>Download MGW Data:&nbsp;</h4>
			<?php
			echo ExportMenu::widget([
				'dataProvider' => $MGWdataProvider,
			]);
			?>
			<hr>	
 		</div>
 	</div>
 	<div class="col-md-9">
 		<div class="panel panel-green">
			<h4>Download RNC Reference Data:&nbsp;</h4>
			<?php
			echo ExportMenu::widget([
				'dataProvider' => $RNCdataProvider,
			]);
			?>
			<hr>	
 		</div>
 	</div>
	<div class="col-md-9">
 		<div class="panel panel-green">
			<h4>Download Trunk VOIP Reference Data:&nbsp;</h4>
			<?php
			echo ExportMenu::widget([
				'dataProvider' => $TVdataProvider,
			]);
			?>
			<hr>	
 		</div>
 	</div>
 	<div class="col-md-9">
 		<div class="panel panel-green">
			<h4>Download Trunk Interkoneksi Data:&nbsp;</h4>
			<?php
			echo ExportMenu::widget([
				'dataProvider' => $TIdataProvider,
			]);
			?>
			<hr>	
 		</div>
 	</div>
</div>
