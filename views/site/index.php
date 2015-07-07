<?php
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

/* @var $this yii\web\View */
$this->title = 'Sistem Informasi Network Element';
?>
<div class="site-index">
    <div align = center><h1>Dashboard</h1></div>

    <div class="row">
    	<div class="col-lg-2" id="bluebox">
            <div class="inner">
            	<h2><?= $NEcount ?></h2>
            	<p>Total Network Element</p>
            </div>
            <div class="icon">
            	<i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    	</div>
    </div>
   
    <br>
 	<div class="row">
 		<div class="col-md-6">
			<?= Highcharts::widget([
			   	'options' => [
			    	'title' => ['text' => 'Network Element Vendor'],
			      	'yAxis' => [
			         	'title' => ['text' => 'count']
			      	],
			      	'series' => 
			        [
			         	[
                			'type' => 'pie',
                			'name' => 'count',
                			'data' => $vendorNE,
			                'center' => [300, 90],
			                'size' => 180,
			                'showInLegend' => true,
			                'dataLabels' => [
			                    'enabled' => false,
        					],
            			],
			      	],
			      	'credits' => ['enabled' => false],
			   	]
			]);
			?>
		</div>
		<div class="col-md-6">
			<?= Highcharts::widget([
			   	'options' => [
			    	'title' => ['text' => 'MSC Vendor'],
			      	'yAxis' => [
			         	'title' => ['text' => 'count']
			      	],
			      	'series' => 
			        [
			         	[
                			'type' => 'pie',
                			'name' => 'count',
                			'data' => $vendorMSC,
			                'center' => [300, 90],
			                'size' => 180,
			                'showInLegend' => true,
			                'dataLabels' => [
			                    'enabled' => false,
        					],
            			],
			      	],
			      	'credits' => ['enabled' => false],
			   	]
			]);
			?>
		</div>
	</div>

	<br>
    <div class="row">
    	<div class="col-lg-12">
            <?= Highcharts::widget([
			   	'options' => [
			    	'title' => ['text' => 'POI Partner'],
			    	'xAxis' => [
			         	'type' => 'category'
			      	],
			      	'yAxis' => [
			         	'title' => ['text' => 'Total Trunk']
			      	],
			      	'series' => 
			        [
			         	[
                			'type' => 'column',
                			'name' => 'Trunk',
                			'data' => $partnerPOI,
			                'showInLegend' => false,
			                'dataLabels' => [
			                    'enabled' => true,
        					],
            			],
			      	],
			      	'credits' => ['enabled' => false],
			   	]
			]);
			?>
    	</div>
    </div>
</div>
