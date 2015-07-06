<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use rmrevin\yii\fontawesome\FA;

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

            $("#toggle1").click(function(){
                $("#item1").toggle(120);
                $("#item2").toggle(120);
                $("#item3").toggle(120);
                $("#item4").toggle(120);
                if (sessionStorage.flag1=="0")
                    sessionStorage.flag1="1";
                else
                    sessionStorage.flag1="0";
            });

            $("#toggle2").click(function(){
                $("#item5").toggle(120);
                $("#item6").toggle(120);
                $("#item7").toggle(120);
                $("#item8").toggle(120);
                $("#item9").toggle(120);
                $("#item10").toggle(120);
                $("#item11").toggle(120);
                $("#item12").toggle(120);
                $("#item13").toggle(120);
                if (sessionStorage.flag2=="0")
                    sessionStorage.flag2="1";
                else
                    sessionStorage.flag2="0";
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
                        ['label' => FA::icon('sign-out').'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>


        <?php

            echo Nav::widget([
                'options' => ['class' => 'nav-pills nav-stacked'],
                'items' => [            
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'Download','url' => ['/site/download']],
                    ['label' => 'Network Data', 'options' => ['id' => 'toggle1']],
                    ['label' => 'Network Element', 'url' => ['/networkelement/index'], 'options' => ['id' => 'item1']],
                    ['label' => 'Trunk Interkoneksi', 'url' => ['/trunkinterkoneksi/index'], 'options' => ['id' => 'item2']],
                    ['label' => 'Trunk VOIP', 'url' => ['/trunkvoip/index'], 'options' => ['id' => 'item3']],
                    ['label' => 'POI', 'url' => ['/poi/index'], 'options' => ['id' => 'item4']],            
                ],
            ]);
            if (!Yii::$app->user->isGuest)
            {
                echo Nav::widget([
                    'options' => ['class' => 'nav-pills nav-stacked'],
                    'items' => [
                        ['label' => 'Home', 'url' => ['/site/index']],
                        ['label' => 'Download','url' => ['/site/download']],
                        ['label' => 'Network Data', 'options' => ['id' => 'toggle1']],
                        ['label' => 'Network Element', 'url' => ['/networkelement/index'], 'options' => ['id' => 'item1']],
                        ['label' => 'Trunk Interkoneksi', 'url' => ['/trunkinterkoneksi/index'], 'options' => ['id' => 'item2']],
                        ['label' => 'Trunk VOIP', 'url' => ['/trunkvoip/index'], 'options' => ['id' => 'item3']],
                        ['label' => 'POI', 'url' => ['/poi/index'], 'options' => ['id' => 'item4']],
                        ['label' => 'Information', 'options' => ['id' => 'toggle2']],
                        ['label' => 'GT Rule', 'url' => ['/gtrule/index'], 'options' => ['id' => 'item13']],
                        ['label' => 'GT Proposed List', 'url' => ['/gtproposedlist/index'], 'options' => ['id' => 'item5']],
                        ['label' => 'SPC Rule', 'url' => ['/spcrule/index'], 'options' => ['id' => 'item6']],
                        ['label' => 'SPC Ran Sharing', 'url' => ['/spcransharing/index'], 'options' => ['id' => 'item7']],
                        ['label' => 'SCT Port Huawei', 'url' => ['/sctporthuawei/index'], 'options' => ['id' => 'item8']],
                        ['label' => 'MSRN Rule', 'url' => ['/msrnrule/index'], 'options' => ['id' => 'item9']],
                        ['label' => 'MSRN Routing', 'url' => ['/msrnrouting/index'], 'options' => ['id' => 'item10']],
                        ['label' => 'MSRN Proposed List', 'url' => ['/msrnproposedlist/index'], 'options' => ['id' => 'item11']],
                        ['label' => 'PABX Info', 'url' => ['/pabxinfo/index'], 'options' => ['id' => 'item12']],
                        ['label' => 'Create Admin', 'url' => ['/site/user']],
                    ],
                ]);
            }

        /*<ul class="nav nav-pills nav-stacked">
            <?= Html::a('<li>Home</li>', ['site/index']) ?>
            <p id="flag1"></p>
            <li id="toggle1">Network Data</li>
            <?= Html::a('<li id="item1">Network Element</li>', ['networkelement/index']) ?>
            <?= Html::a('<li id="item2">Trunk Interkoneksi</li>', ['trunkinterkoneksi/index']) ?>
            <?= Html::a('<li id="item3">Trunk VOIP</li>', ['trunkvoip/index']) ?>
            <?= Html::a('<li id="item4">POI</li>', ['poi/index']) ?>
            <?php if (!Yii::$app->user->isGuest) echo '<li id="toggle2">Information</li>'; ?>
            <?php if (!Yii::$app->user->isGuest) echo Html::a('<li id="item13">GT Rule</li>', ['gtrule/index']) ?> 
            <?php if (!Yii::$app->user->isGuest) echo Html::a('<li id="item5">GT Proposed List</li>', ['gtproposedlist/index']) ?> 
            <?php if (!Yii::$app->user->isGuest) echo Html::a('<li id="item6">SPC Rule</li>', ['spcrule/index']) ?> 
            <?php if (!Yii::$app->user->isGuest) echo Html::a('<li id="item7">SPC Ran Sharing</li>', ['spcransharing/index']) ?> 
            <?php if (!Yii::$app->user->isGuest) echo Html::a('<li id="item8">SCT Port Huawei</li>', ['sctporthuawei/index']) ?> 
            <?php if (!Yii::$app->user->isGuest) echo Html::a('<li id="item9">MSRN Rule</li>', ['msrnrule/index']) ?> 
            <?php if (!Yii::$app->user->isGuest) echo Html::a('<li id="item10">MSRN Routing</li>', ['msrnrouting/index']) ?> 
            <?php if (!Yii::$app->user->isGuest) echo Html::a('<li id="item11">MSRN Proposed List</li>', ['msrnproposedlist/index']) ?> 
            <?php if (!Yii::$app->user->isGuest) echo Html::a('<li id="item12">PABX Info</li>', ['pabxinfo/index']) ?> 
            <?php if (!Yii::$app->user->isGuest) echo Html::a('<li>Create Admin</li>', ['site/user'], ['data-method' => 'post']); ?>
            <li class="active">
                <?= Html::a('Download', ['site/download']) ?>
            </li>

        </ul>*/
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
            <p class="pull-center">&copy; Fasilkom UI <?= date('Y') ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
