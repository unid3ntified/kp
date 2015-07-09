<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Sistem Informasi Network Element';
?>
<div class="site-index">
	<div class="row">
        <div class="col-lg-12">
            <div id="Carousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                <li data-target="#Carousel" data-slide-to="1"></li>
                <li data-target="#Carousel" data-slide-to="2"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <?php echo Html::img('@web/images/slider1.jpg', ['class'=> "img-rounded"]) ?>
                </div>

                <div class="item">
                  <?php echo Html::img('@web/images/slider2.jpg', ['class'=> "img-rounded"]) ?>
                </div>

                <div class="item">
                  <?php echo Html::img('@web/images/slider3.jpg', ['class'=> "img-rounded"]) ?>
                </div>
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#Carousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#Carousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-offset-2">
            <h2 align="center">Berita Terkini</h2>
            <div class="row">
                <h3>News Title</h3>
                <div class="col-sm-3">Insert Image Here</div>
                <div class="col-sm-5">Lorem Ipsum Dolor sit amet</div>
            </div>
            <br>
            <hr>
            <div class="row">
                <h3>News Title</h3>
                <div class="col-sm-3">Insert Image Here</div>
                <div class="col-sm-5">Lorem Ipsum Dolor sit amet</div>
            </div>
            <br>
            <hr>
            <div class="row">
                <h3>News Title</h3>
                <div class="col-sm-3">Insert Image Here</div>
                <div class="col-sm-5">Lorem Ipsum Dolor sit amet</div>
            </div>
            <br>
            <hr>
        </div>
    </div>
</div>
