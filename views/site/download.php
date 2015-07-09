<?php
use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

/* @var $this yii\web\View */
$this->title = 'Download';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-8">
 		<div class="panel panel-green">
			<h4>Download Network Element Data:&nbsp;</h4>
			<?php
			echo ExportMenu::widget([
				'dataProvider' => $NEdataProvider,
			]);
			?>	
 		</div>
 	</div>
 	
 	<div class="col-md-8">
 		<div class="panel panel-green">
			<h4>Download OPC Data:&nbsp;</h4>
			<?php
			echo ExportMenu::widget([
				'dataProvider' => $OPCdataProvider,
			]);
			?>	
 		</div>
 	</div>

 	<div class="col-md-8">
 		<div class="panel panel-green">
			<h4>Download MSC Data:&nbsp;</h4>
			<?php
			echo ExportMenu::widget([
				'dataProvider' => $MSCdataProvider,
			]);
			?>	
 		</div>
 	</div>

 	<div class="col-md-8">
 		<div class="panel panel-green">
			<h4>Download MGW Data:&nbsp;</h4>
			<?php
			echo ExportMenu::widget([
				'dataProvider' => $MGWdataProvider,
			]);
			?>	
 		</div>
 	</div>

    <div class="col-md-8">
 		<div class="panel panel-green">
			<h4>Download RNC Reference Data:&nbsp;</h4>
			<?php
			echo ExportMenu::widget([
				'dataProvider' => $RNCdataProvider,
			]);
			?>	
 		</div>
 	</div>

	<div class="col-md-8">
 		<div class="panel panel-green">
			<h4>Download Trunk VOIP Reference Data:&nbsp;</h4>
			<?php
			echo ExportMenu::widget([
				'dataProvider' => $TVdataProvider,
			]);
			?>	
 		</div>
 	</div>

 	<div class="col-md-8">
 		<div class="panel panel-green">
			<h4>Download Trunk Interkoneksi Data:&nbsp;</h4>
			<?php
			echo ExportMenu::widget([
				'dataProvider' => $TIdataProvider,
			]);
			?>	
 		</div>
 	</div>
</div>
