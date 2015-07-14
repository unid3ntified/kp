<?php

use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-dashboard">
	
    <div class="row">
    	<div class="col-lg-2" id="bluebox">
            <div class="inner">
        	   <h2 ><?= $NEcount ?></h2>
        	   <p>Total NE</p>
            </div>

            <div class="row" id= "detailtext">
            <?= Html::a('View Details ', ['networkelement/index']) ?>
            </div>
    	</div>

    	<div class="col-sm-2" id="greenbox">
            <div class="inner">
            	<h2><?= $MSCcount ?></h2>
            	<p>Total MSC</p>
            </div>
            
            <div class="row" id= "detailtextg">
            <?= Html::a('View Details ', ['msc/index']) ?>
            </div>
    	</div>
    

    	<div class="col-sm-2" id="redbox">
            <div class="inner">
            	<h2><?= $MGWcount ?></h2>
            	<p>Total MGW</p>
            </div>
            
            <div class="row" id= "detailtextr">
            <?= Html::a('View Details ', ['bcuid/index']) ?>
            </div>
        </div>

        <div class="col-sm-2" id="orangebox">
            <div class="inner">
                <h2><?= $SGSNcount ?></h2>
                <p>Total SGSN</p>
            </div>
            
            <div class="row" id= "detailtexto">
            <?= Html::a('View Details ', ['networkelement/index', 'NetworkElementSearch[search]' => 'SGSN']) ?>
            </div>
        </div>
    </div>


    <br>
    <div class="row">
        <div class="col-lg-2" id="purplebox">
            <div class="inner">
                <h2><?= $HLRcount ?></h2>
                <p>Total HLR</p>
            </div>
          
           
            <div class="row" id= "detailtextp">
            <?= Html::a('View Details ', ['networkelement/index', 'NetworkElementSearch[search]' => 'HLR']) ?>
            </div>
      
        </div>

        <div class="col-sm-2" id="yellowbox">
            <div class="inner">
                <h2><?= $POIcount ?></h2>
                <p>Total POI</p>
            </div>
            
            <div class="row" id= "detailtexty">
            <?= Html::a('View Details ', ['poi/index']) ?>
            </div>
        </div>


    	<div class="col-sm-2" id="oceanbox">
            <div class="inner">
            	<h2><?= $Partnercount ?></h2>
            	<p>VOIP Partner</p>
            </div>
            
            <div class="row" id= "detailtextc">
            <a href="#" id="toggle3">View Details </a>
            </div>
        </div>

    	<div class="col-sm-2" id="greybox">
            <div class="inner">
            	<h2><?= $PartnerPOIcount ?></h2>
            	<p>POI Partner</p>
            </div>
            
            <div class="row" id= "detailtexte">
            <a href="#" id="toggle4">View Details </a>
            </div>

    	</div>
    </div>


    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="row" id="chart1">
                <?= Highcharts::widget([
                    'options' => [
                        'title' => ['text' => 'VOIP Partner'],
                        'xAxis' => [
                            'type' => 'category'
                        ],
                        'yAxis' => [
                            'title' => ['text' => 'Total Trunk']
                        ],
                        'chart' => [
                            'width' => 1200,
                        ],
                        'series' => 
                        [
                            [
                                'type' => 'column',
                                'name' => 'Trunk',
                                'data' => $partnerVOIP,
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
            <div class="row" id="chart2">
                <?= Highcharts::widget([
                    'options' => [
                        'title' => ['text' => 'POI Partner'],
                        'xAxis' => [
                            'type' => 'category'
                        ],
                        'yAxis' => [
                            'title' => ['text' => 'Total Trunk']
                        ],
                        'chart' => [
                            'width' => 1200,
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
    <div class="row">
     	<div class="col-lg-9">

            <div class="row" id="chart3">
                <?= Highcharts::widget([
                     'scripts' => [
                        'modules/exporting',
                    ],
                    'options' => [
                        'title' => ['text' => 'MSC Summary'],
                        'chart' => [
                            'height' => 810,  
                        ],
                        'xAxis' => [
                            'type' => 'category'
                        ],
                        'yAxis' => [
                            'title' => ['text' => 'Total MSC/MGW']
                        ],
                        'series' => 
                        [
                            [
                                'type' => 'bar',
                                'name' => 'MGW',
                                'data' => $MGWpool,
                                'showInLegend' => false,
                                'dataLabels' => [
                                    'enabled' => true,
                                ],
                                'color' => '#fa5b24',
                            ],
                            [
                                'type' => 'bar',
                                'name' => 'MSC',
                                'data' => $MSCpool,
                                'showInLegend' => false,
                                'dataLabels' => [
                                    'enabled' => true,
                                ],
                                'color' => '#24b66c',
                            ],                                               
                        ],
                        'credits' => ['enabled' => false],
                    ]
                ]);
                ?>
            </div>
        </div>


		<div class="col-sm-3">
            <div class="row" id="chart5">
                <?= Highcharts::widget([
                    'options' => [
                        'title' => ['text' => 'Network Element Vendor'],
                        'chart' => [
                          'borderColor'=>'#e5e5e5',
                          'type' => 'pie',
                        ],
                        'series' => 
                        [
                            [
                                'name' => 'count',
                                'data' => $vendorNE,
                                'showInLegend' => true,
                                'size' => '90%',
                                'dataLabels' => [
                                    'enabled' => false,
                                ],
                            ],
                            [
                                'name' => 'Network Element Vendor',
                                'data' => [
                                    [
                                        'name' => '',
                                        'y' => $NEvendor,
                                        'color' => '#ffffff',
                                    ]
                                ],
                                'size' => '50%',
                                'showInLegend' => false,
                                'dataLabels' => [
                                    'enabled' => false,
                                ],
                            ]
                        ],
                        'credits' => ['enabled' => false],
                    ]
                ]);
                ?>
            </div>
            <div class="row" id="chart6">
    			<?= Highcharts::widget([
    			   	'options' => [
    			    	'title' => ['text' => 'MSC Vendor'],
                        'chart' => [
                          'borderColor'=>'#e5e5e5',
                          'type' => 'pie',
                        ],
    			      	'series' => 
    			        [
    			         	[
                    			'name' => 'count',
                                'size' => '70%',
                    			'data' => $vendorMSC,
    			                'showInLegend' => true,
    			                'dataLabels' => [
    			                    'enabled' => false,
            					],
                			],
                            /*[
                                'name' => 'MSC Vendor',
                                'data' => [
                                    [
                                        'name' => '',
                                        'y' => $MSCvendor,
                                        'color' => '#ffffff',
                                    ]
                                ],
                                'size' => '40%',
                                'showInLegend' => false,
                                'dataLabels' => [
                                    'enabled' => false,
                                ],
                            ]*/
    			      	],
    			      	'credits' => ['enabled' => false],
    			   	]
    			]);
    			?>
            </div>
    	</div> 

    </div>
</div>
