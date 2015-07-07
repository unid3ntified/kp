<?php
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

/* @var $this yii\web\View */
$this->title = 'Sistem Informasi Network Element';
?>
<div class="site-index">
	<div id = "dashtext">Dashboard</div>
    <div class="row">
    	<div class="col-lg-2" id="bluebox">
            <div class="inner">
            	<h2><?= $NEcount ?></h2>
            	<p>Total NE</p>
            </div>
            
            <div id= "detailtext">
            <a href="#" >View Details </a>
            </div>
    	</div>

    	<div class="col-lg-2" id="greenbox">
            <div class="inner">
            	<h2><?= $MSCcount ?></h2>
            	<p>Total MSC</p>
            </div>
            
            <div id= "detailtextg">
            <a href="#" >View Details </a>
            </div>
    	</div>
    

    	<div class="col-lg-2" id="redbox">
            <div class="inner">
            	<h2><?= $MGWcount ?></h2>
            	<p>Total MGW</p>
            </div>
            
            <div id= "detailtextr">
            <a href="#" >View Details </a>
            </div>
        </div>

        <div class="col-lg-2" id="orangebox">
            <div class="inner">
                <h2><?= $SGSNcount ?></h2>
                <p>Total SGSN</p>
            </div>
            
            <div id= "detailtexto">
            <a href="#" >View Details </a>
            </div>
        </div>

        <div class="col-lg-2" id="purplebox">
            <div class="inner">
                <h2><?= $HLRcount ?></h2>
                <p>Total HLR</p>
            </div>
          
           
            <div id= "detailtextp">
            <a href="#" >View Details </a>
            </div>
      
        </div>

        <div class="col-lg-2" id="yellowbox">
            <div class="inner">
                <h2><?= $POIcount ?></h2>
                <p>Total POI</p>
            </div>
            
            <div id= "detailtexty">
            <a href="#" >View Details </a>
            </div>
        </div>

    	<div class="col-lg-2" id="oceanbox">
            <div class="inner">
            	<h2><?= $Partnercount ?></h2>
            	<p>Total Partner VOIP</p>
            </div>
            
            <div id= "detailtextc">
            <a href="#" >View Details </a>
            </div>
    	</div>

    	<div class="col-lg-2" id="greybox">
            <div class="inner">
            	<h2><?= $PartnerPOIcount ?></h2>
            	<p>Total Partner POI</p>
            </div>
            
            <div id= "detailtexte">
            <a href="#" >View Details </a>
            </div>
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
			                'center' => [150, 90],
			                'size' => 150,
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
    <br>
 	<div class="row">
 		<div class="col-md-4">
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
			                'center' => [150, 90],
			                'size' => 150,
			                'showInLegend' => true,
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
		<div class="col-md-4">
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
			                'center' => [150, 90],
			                'size' => 150,
			                'showInLegend' => true,
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
		<div class="col-md-4">
			<?= Highcharts::widget([
			   	'options' => [
			    	'title' => ['text' => 'MGW Vendor'],
			      	'yAxis' => [
			         	'title' => ['text' => 'count']
			      	],
			      	'series' => 
			        [
			         	[
                			'type' => 'pie',
                			'name' => 'count',
                			'data' => $vendorMGW,
			                'center' => [150, 90],
			                'size' => 150,
			                'showInLegend' => true,
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
