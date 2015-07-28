<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="<?php echo Yii::$app->urlManager->baseUrl; ?>/assets/tes.js"></script>
    <script>
        $(document).ready(function(){
            if(typeof(Storage)!=="undefined")
            {
            /*
                initializing session storage.
            */
                if (sessionStorage.flag1==null)
                    sessionStorage.flag1="0";
                if (sessionStorage.flag2==null)
                    sessionStorage.flag2="0";
            }
            else
            {
                document.getElementById("flag1").innerHTML="Sorry, your browser does not support web storage...";
            }
            
            if (sessionStorage.flag1=="0")
            {
                $("#item1").hide();
                $("#item2").hide();
                $("#item3").hide();
                $("#item4").hide();
                $("#item14").hide();
            }
            if (sessionStorage.flag2=="0")
            {
                $("#item5").hide();
                $("#item6").hide();
                $("#item7").hide();
                $("#item8").hide();
                $("#item9").hide();
                $("#item10").hide();
                $("#item11").hide();
                $("#item12").hide();
                $("#item13").hide();
            }
                $("#chart1").hide();
                $("#chart2").hide();

            $("#toggle1").click(function(){
                $("#item1").toggle(320);
                $("#item2").toggle(320);
                $("#item3").toggle(320);
                $("#item4").toggle(320);
                $("#item14").toggle(320);
                if (sessionStorage.flag1=="0")
                    sessionStorage.flag1="1";
                else
                    sessionStorage.flag1="0";
               
               if (sessionStorage.flag2=="1")
                {
                    sessionStorage.flag2="0";
                    $("#item5").toggle(320);
                    $("#item6").toggle(320);
                    $("#item7").toggle(320);
                    $("#item8").toggle(320);
                    $("#item9").toggle(320);
                    $("#item10").toggle(320);
                    $("#item11").toggle(320);
                    $("#item12").toggle(320);
                    $("#item13").toggle(320);

                }
            });

            $("#toggle2").click(function(){
                if (sessionStorage.flag1=="1")
                {
                    sessionStorage.flag1="0";
                    $("#item1").toggle(320);
                    $("#item2").toggle(320);
                    $("#item3").toggle(320);
                    $("#item4").toggle(320);
                    $("#item14").toggle(320);
                }

                $("#item5").toggle(320);
                $("#item6").toggle(320);
                $("#item7").toggle(320);
                $("#item8").toggle(320);
                $("#item9").toggle(320);
                $("#item10").toggle(320);
                $("#item11").toggle(320);
                $("#item12").toggle(320);
                $("#item13").toggle(320);
                if (sessionStorage.flag2=="0")
                    sessionStorage.flag2="1";
                else
                    sessionStorage.flag2="0";
            });
            $("#toggle3").click(function(){
                $("#chart2").hide();
                $("#chart1").show(640);

            });
            $("#toggle4").click(function(){
                $("#chart1").hide();
                $("#chart2").show(640);

            });
        });
    </script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                //'brandLabel' => 'My Company',
                //'brandUrl' => Yii::$app->homeUrl,
                //'options' => [
               //     'class' => 'navbar-inverse navbar-fixed-top',
               // ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [            
                    Yii::$app->user->isGuest ?
                        ['label' => ' Login', 'url' => ['/site/login']] :
                        ['label' => ' Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <?php       
            if (!Yii::$app->user->isGuest)
            {
                echo Nav::widget([
                    'options' => ['class' => 'nav-pills nav-stacked'],
                    'items' => [
                        ['label' => ' Home', 'url' => ['/site/index']],
                        ['label' => ' Dashboard', 'url' => ['/site/dashboard']],
                        ['label' => ' Knowledge Sharing','url' => ['/sharing/index']],
                        ['label' => ' Network Topology','url' => ['/site/topology']],
                        ['label' => ' Network Data', 'options' => ['id' => 'toggle1']],
                        ['label' => 'Network Element', 'url' => ['/networkelement/index'], 'options' => ['id' => 'item1']],
                        ['label' => 'Interconnection Trunk', 'url' => ['/trunkinterkoneksi/index'], 'options' => ['id' => 'item2']],
                        ['label' => 'VOIP Trunk', 'url' => ['/trunkvoip/index'], 'options' => ['id' => 'item3']],
                        ['label' => 'POI', 'url' => ['/poi/index'], 'options' => ['id' => 'item4']],
                        ['label' => ' Download','url' => ['/site/download'], 'options' => ['id' => 'item14']],
                        ['label' => ' Network Information', 'options' => ['id' => 'toggle2']],
                        ['label' => 'GT Rule', 'url' => ['/gtrule/index'], 'options' => ['id' => 'item13']],
                        ['label' => 'GT Proposed List', 'url' => ['/gtproposedlist/index'], 'options' => ['id' => 'item5']],
                        ['label' => 'SPC Rule', 'url' => ['/spcrule/index'], 'options' => ['id' => 'item6']],
                        ['label' => 'SPC Ran Sharing', 'url' => ['/spcransharing/index'], 'options' => ['id' => 'item7']],
                        ['label' => 'SCT Port Huawei', 'url' => ['/sctporthuawei/index'], 'options' => ['id' => 'item8']],
                        ['label' => 'MSRN Rule', 'url' => ['/msrnrule/index'], 'options' => ['id' => 'item9']],
                        ['label' => 'MSRN Routing', 'url' => ['/msrnrouting/index'], 'options' => ['id' => 'item10']],
                        ['label' => 'MSRN Proposed List', 'url' => ['/msrnproposedlist/index'], 'options' => ['id' => 'item11']],
                        ['label' => 'PABX Info', 'url' => ['/pabxinfo/index'], 'options' => ['id' => 'item12']],
                        ['label' => ' Create Admin', 'url' => ['/site/user']],
                    ],
                ]);
            }
            else
            {
                echo Nav::widget([
                    'options' => ['class' => 'nav-pills nav-stacked'],
                    'items' => [            
                        ['label' => ' Home', 'url' => ['/site/index']],
                        ['label' => ' Dashboard', 'url' => ['/site/dashboard']],
                        ['label' => ' Knowledge Sharing','url' => ['/sharing/index']],
                        ['label' => ' Network Topology','url' => ['/site/topology']],
                        ['label' => ' Network Data', 'options' => ['id' => 'toggle1']],
                        ['label' => 'Network Element', 'url' => ['/networkelement/index'], 'options' => ['id' => 'item1']],
                        ['label' => 'Interconnection Trunk', 'url' => ['/trunkinterkoneksi/index'], 'options' => ['id' => 'item2']],
                        ['label' => 'VOIP Trunk', 'url' => ['/trunkvoip/index'], 'options' => ['id' => 'item3']],
                        ['label' => 'POI', 'url' => ['/poi/index'], 'options' => ['id' => 'item4']],
                        ['label' => ' Download','url' => ['/site/download'], 'options' => ['id' => 'item14']],
                        ['label' => ' Network Information', 'options' => ['id' => 'toggle2']],
                        ['label' => 'GT Rule', 'url' => ['/gtrule/index'], 'options' => ['id' => 'item13']],
                        ['label' => 'GT Proposed List', 'url' => ['/gtproposedlist/index'], 'options' => ['id' => 'item5']],
                        ['label' => 'SPC Rule', 'url' => ['/spcrule/index'], 'options' => ['id' => 'item6']],
                        ['label' => 'SPC Ran Sharing', 'url' => ['/spcransharing/index'], 'options' => ['id' => 'item7']],
                        ['label' => 'SCT Port Huawei', 'url' => ['/sctporthuawei/index'], 'options' => ['id' => 'item8']],
                        ['label' => 'MSRN Rule', 'url' => ['/msrnrule/index'], 'options' => ['id' => 'item9']],
                        ['label' => 'MSRN Routing', 'url' => ['/msrnrouting/index'], 'options' => ['id' => 'item10']],
                        ['label' => 'MSRN Proposed List', 'url' => ['/msrnproposedlist/index'], 'options' => ['id' => 'item11']],
                        ['label' => 'PABX Info', 'url' => ['/pabxinfo/index'], 'options' => ['id' => 'item12']],            
                    ],
                ]);
            }
        ?>

        <div id="page-wrapper">
            <?= Breadcrumbs::widget([
                'homeLink' => [
                    'label' => Yii::t('yii', 'Home'),
                    'url' => Yii::$app->homeUrl,
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-center">&copy; 2015 Fasilkom UI </p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
