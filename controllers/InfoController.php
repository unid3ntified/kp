<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\GtProposedlistSearch;
use app\models\GtRuleSearch;
use app\models\SpcRuleSearch;
use app\models\SpcRansharingSearch;
use app\models\SctPortHuaweiSearch;
use app\models\MsrnRuleSearch;
use app\models\MsrnRoutingSearch;
use app\models\MsrnProposedlistSearch;
use app\models\PabxInfoSearch;

class InfoController extends Controller
{
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'gr', 'gp', 'sr', 'srs', 'sph', 'mrule', 'mrouting', 'mp', 'pi'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'data';

        return $this->render('index', [
  
        ]);
    }

    public function actionGr()
    {
        $this->layout = 'data';
        $GRsearchModel = new GtRuleSearch();
        $GRdataProvider = $GRsearchModel->search(Yii::$app->request->queryParams);   

        return $this->render('gr', [
            'dataProvider' => $GRdataProvider,
            'searchModel' => $GRsearchModel,          
        ]);
    }

    public function actionGp()
    {
    	$this->layout = 'data';
    	$GPsearchModel = new GtProposedlistSearch();
        $GPdataProvider = $GPsearchModel->search(Yii::$app->request->queryParams);

         return $this->render('gp', [
            'dataProvider' => $GPdataProvider,
            'searchModel' => $GPsearchModel,
        ]);
    }

    public function actionSr()
    {
    	$this->layout = 'data';
    	$SRsearchModel = new SpcRuleSearch;
        $SRdataProvider = $SRsearchModel->search(Yii::$app->request->queryParams);

         return $this->render('sr', [
            'dataProvider' => $SRdataProvider,
            'searchModel' => $SRsearchModel,
        ]);
    }

    public function actionSrs()
    {
    	$this->layout = 'data';
    	$SRSsearchModel = new SpcRansharingSearch;
        $SRSdataProvider = $SRSsearchModel->search(Yii::$app->request->queryParams);

         return $this->render('srs', [
            'dataProvider' => $SRSdataProvider,
            'searchModel' => $SRSsearchModel,
        ]);
    }

    public function actionSph()
    {
    	$this->layout = 'data';
    	$SPHsearchModel = new SctPortHuaweiSearch;
        $SPHdataProvider = $SPHsearchModel->search(Yii::$app->request->queryParams);

         return $this->render('sph', [
            'dataProvider' => $SPHdataProvider,
            'searchModel' => $SPHsearchModel,
        ]);
    }

    public function actionMrule()
    {
    	$this->layout = 'data';
    	$MRulesearchModel = new MsrnRuleSearch;
        $MRuledataProvider = $MRulesearchModel->search(Yii::$app->request->queryParams);

         return $this->render('mrule', [
            'dataProvider' => $MRuledataProvider,
            'searchModel' => $MRulesearchModel,
        ]);
    }

    public function actionMrouting()
    {
    	$this->layout = 'data';
    	$MRoutingsearchModel = new MsrnRoutingSearch;
        $MRoutingdataProvider = $MRoutingsearchModel->search(Yii::$app->request->queryParams);

         return $this->render('mrouting', [
            'dataProvider' => $MRoutingdataProvider,
            'searchModel' => $MRoutingsearchModel,
        ]);
    }

    public function actionMp()
    {
    	$this->layout = 'data';
    	$MPsearchModel = new MsrnProposedlistSearch;
        $MPdataProvider = $MPsearchModel->search(Yii::$app->request->queryParams);

         return $this->render('mp', [
            'dataProvider' => $MPdataProvider,
            'searchModel' => $MPsearchModel,
        ]);
    }

    public function actionPi()
    {
    	$this->layout = 'data';
    	$PIsearchModel = new PabxInfoSearch;
        $PIdataProvider = $PIsearchModel->search(Yii::$app->request->queryParams);

         return $this->render('pi', [
            'dataProvider' => $PIdataProvider,
            'searchModel' => $PIsearchModel,
        ]);
    }
}