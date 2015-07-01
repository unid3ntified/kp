<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Dropdown;

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
            $("#item1").hide();
            $("#item2").hide();
            $("#item3").hide();
            $("#item4").hide();
            $("#item5").hide();
            $("#item6").hide();
            $("#item7").hide();
            $("#item8").hide();
            $("#item9").hide();
            $("#item10").hide();
            $("#item11").hide();
            $("#item12").hide();
            $("#item13").hide();

            $("#toggle1").click(function(){
                $("#item1").toggle(120);
                $("#item2").toggle(120);
                $("#item3").toggle(120);
                $("#item4").toggle(120);
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
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>
        <div id="sidebar">
            <?= Html::a('<div class="sidebar-element text-left">Home</div>', ['site/index']) ?>
            <div class="sidebar-element text-left" id="toggle1">Network Data</div>
            <?= Html::a('<div class="sidebar-element text-left" id="item1">Network Element</div>', ['networkelement/index']) ?>
            <?= Html::a('<div class="sidebar-element text-left" id="item2">Trunk Interkoneksi</div>', ['trunkinterkoneksi/index']) ?>
            <?= Html::a('<div class="sidebar-element text-left" id="item3">Trunk VOIP</div>', ['trunkvoip/index']) ?>
            <?= Html::a('<div class="sidebar-element text-left" id="item4">POI</div>', ['poi/index']) ?>
            <?php if (!Yii::$app->user->isGuest) echo '<div class="sidebar-element text-left" id="toggle2">Information</div>'; ?>
            <?= Html::a('<div class="sidebar-element text-left" id="item13">GT Rule</div>', ['gtrule/index']) ?> 
            <?= Html::a('<div class="sidebar-element text-left" id="item5">GT Proposed List</div>', ['gtproposedlist/index']) ?> 
            <?= Html::a('<div class="sidebar-element text-left" id="item6">SPC Rule</div>', ['spcrule/index']) ?> 
            <?= Html::a('<div class="sidebar-element text-left" id="item7">SPC Ran Sharing</div>', ['spcransharing/index']) ?> 
            <?= Html::a('<div class="sidebar-element text-left" id="item8">SCT Port Huawei</div>', ['sctporthuawei/index']) ?> 
            <?= Html::a('<div class="sidebar-element text-left" id="item9">MSRN Rule</div>', ['msrnrule/index']) ?> 
            <?= Html::a('<div class="sidebar-element text-left" id="item10">MSRN Routing</div>', ['msrnrouting/index']) ?> 
            <?= Html::a('<div class="sidebar-element text-left" id="item11">MSRN Proposed List</div>', ['msrnproposedlist/index']) ?> 
            <?= Html::a('<div class="sidebar-element text-left" id="item12">PABX Info</div>', ['pabxinfo/index']) ?> 
            <?php if (!Yii::$app->user->isGuest) echo Html::a('<div class="sidebar-element text-left">Create Admin</div>', ['site/user'], ['data-method' => 'post']); ?>

        </div>
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
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
