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
				$filename = 'NetworkElement_'.date('Y-m-d');
			echo ExportMenu::widget([
				'dataProvider' => $NEdataProvider,
				'filename' => $filename,
			]);
			?>	
 		</div>
 	</div>
 	
 	<div class="col-md-8">
 		<div class="panel panel-green">
			<h4>Download OPC Data:&nbsp;</h4>
			<?php
			$filename = 'OPC_'.date('Y-m-d');
			echo ExportMenu::widget([
				'dataProvider' => $OPCdataProvider,
				'filename' => $filename,
			]);
			?>	
 		</div>
 	</div>

 	<div class="col-md-8">
 		<div class="panel panel-green">
			<h4>Download MSC Data:&nbsp;</h4>
			<?php
			$filename = 'MSC_'.date('Y-m-d');
			echo ExportMenu::widget([
				'dataProvider' => $MSCdataProvider,
				'filename' => $filename,
			]);
			?>	
 		</div>
 	</div>

 	<div class="col-md-8">
 		<div class="panel panel-green">
			<h4>Download MGW Data:&nbsp;</h4>
			<?php
			$filename = 'MGW_'.date('Y-m-d');
			echo ExportMenu::widget([
				'dataProvider' => $MGWdataProvider,
				'filename' => $filename,
			]);
			?>	
 		</div>
 	</div>

 	<div class="col-md-8">
 		<div class="panel panel-green">
			<h4>Download BSC Data:&nbsp;</h4>
			<?php
			$filename = 'BSC_'.date('Y-m-d');
			echo ExportMenu::widget([
				'dataProvider' => $BSCdataProvider,
				'filename' => $filename,
			]);
			?>	
 		</div>
 	</div>

    <div class="col-md-8">
 		<div class="panel panel-green">
			<h4>Download RNC Reference Data:&nbsp;</h4>
			<?php
			$filename = 'RNC_'.date('Y-m-d');
			echo ExportMenu::widget([
				'dataProvider' => $RNCdataProvider,
				'filename' => $filename,
			]);
			?>	
 		</div>
 	</div>

	<div class="col-md-8">
 		<div class="panel panel-green">
			<h4>Download Trunk VOIP Reference Data:&nbsp;</h4>
			<?php
			$filename = 'TrunkVOIP_'.date('Y-m-d');
			echo ExportMenu::widget([
				'dataProvider' => $TVdataProvider,
				'filename' => $filename,
			]);
			?>	
 		</div>
 	</div>

 	<div class="col-md-8" id="bottomdownload">
 		<div class="panel panel-green">
			<h4>Download Trunk Interkoneksi Data:&nbsp;</h4>
			<?php
			$filename = 'TrunkInterkoneksi_'.date('Y-m-d');
			echo ExportMenu::widget([
				'dataProvider' => $TIdataProvider,
				'filename' => $filename,
			]);
			?>	
 		</div>
 	</div>
</div>
