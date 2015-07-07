<?php
use miloschuman\highcharts\Highcharts;

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

    	<div class="col-lg-2" id="bluebox">
            <div class="inner">
            	<h2><?= $MSCcount ?></h2>
            	<p>Total MSC</p>
            </div>
            
            <div id= "detailtext">
            <a href="#" >View Details </a>
            </div>
    	</div>
    

    	<div class="col-lg-2" id="bluebox">
            <div class="inner">
            	<h2><?= $MGWcount ?></h2>
            	<p>Total MGW</p>
            </div>
            
            <div id= "detailtext">
            <a href="#" >View Details</a>
            </div>
        </div>

        <div class="col-lg-2" id="bluebox">
            <div class="inner">
                <h2><?= $SGSNcount ?></h2>
                <p>Total SGSN</p>
            </div>
            
            <div id= "detailtext">
            <a href="#" >View Details </a>
            </div>
        </div>

        <div class="col-lg-2" id="bluebox">
            <div class="inner">
                <h2><?= $HLRcount ?></h2>
                <p>Total HLR</p>
            </div>
          
           
            <div id= "detailtext">
            <a href="#" >View Details </a>
            </div>
      
        </div>

        <div class="col-lg-2" id="bluebox">
            <div class="inner">
                <h2><?= $POIcount ?></h2>
                <p>Total POI</p>
            </div>
            
            <div id= "detailtext">
            <a href="#" >View Details </a>
            </div>
        </div>

    	<div class="col-lg-2" id="bluebox">
            <div class="inner">
            	<h2><?= $Partnercount ?></h2>
            	<p>Total Partner VOIP</p>
            </div>
            
            <div id= "detailtext">
            <a href="#" >View Details </a>
            </div>
    	</div>

    	<div class="col-lg-2" id="bluebox">
            <div class="inner">
            	<h2><?= $PartnerPOIcount ?></h2>
            	<p>Total Partner POI</p>
            </div>
            
            <div id= "detailtext">
            <a href="#" >View Details </a>
            </div>
    	</div>

    	</div>

	



    	
  


 	<div class="row">
 		<div class="col-lg-7">
		
		</div>
	</div>
</div>
