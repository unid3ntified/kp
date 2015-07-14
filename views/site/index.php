<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Sistem Informasi Network Element';
?>
<div class="site-index">
	<div class="row">
    <div class="col-md-10 col-md-offset-1">
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
             <?php echo Html::img('@web/images/slider2.jpg', ['class'=> "img-rounded"]) ?>
          </div>

          <div class="item">
              <?php echo Html::img('@web/images/slider3.jpg', ['class'=> "img-rounded"]) ?>
          </div>

          <div class="item">
              <?php echo Html::img('@web/images/slider1.jpg', ['class'=> "img-rounded"]) ?>
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
      <div class="col-md-12">
        <h2 align="center">Breaking News @Core Development</h2>

          <?php
            $newsItem = 0;
            for ($i = count($newsList)-1; $i>=0; $i--)
            {
              $newsItem++;
              if ($newsItem < 5)
              {             
                if ($i % 2 == 1 )
                  echo '<div class="row">';
                echo '<a href="'.Yii::$app->homeUrl.'?r=news/view&id='.$newsList[$i]->id.'">';
                echo '<div class="col-md-6"><h3>'.$newsList[$i]->title.'</h3><div class="row">';
                echo '<div class="col-md-5">'.Html::img(['/file','id'=>$newsList[$i]->image_id]).'</div>';
                if (strlen($newsList[$i]->news_desc) >= 150)
                {
                  for ($j = 0; $j < 150; $j++)
                    $text[$j] = $newsList[$i]->news_desc[$j];
                }
                else $text = $newsList[$i]->news_desc;
                //print_r($text);die;
                echo '<div class="col-md-7">'.$text.'...<br>View More</div></div></div>';
                if ($i % 2 == 0)
                  echo '</div><br><hr>';
                echo '</a>';
              }
            }       
          ?>

        
      <div class="col-md-12" align=right>
        <?php
          if (!Yii::$app->user->isGuest)
            echo Html::a('Manage Slider', ['/news/slider'], ['class' => 'btn btn-success']);
          echo ' ';
          echo Html::a('View Older News', ['/news/index'], ['class' => 'btn btn-primary']); 
        ?>
      </div>
    </div>
  </div>
</div>
