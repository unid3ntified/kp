<?php
use miloschuman\highcharts\Highcharts;

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
 	<div class="row">
 		<div class="col-lg-7">
			<?= Highcharts::widget([
			   	'options' => [
			    	'title' => ['text' => 'Fruit Consumption'],
			      	'xAxis' => [
			         	'categories' => ['Apples', 'Bananas', 'Oranges']
			      	],
			      	'yAxis' => [
			         	'title' => ['text' => 'Fruit eaten']
			      	],
			      	'series' => [
			         	['name' => 'Jane', 'data' => [1, 0, 4]],
			         	['name' => 'John', 'data' => [5, 7, 3]]
			      	]
			   	]
			]);
			?>
		</div>
	</div>
</div>
