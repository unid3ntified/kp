<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\SqlDataProvider;
use app\models\CreateAdmin;
use app\models\GtProposedlistSearch;
use app\models\GtRuleSearch;
use app\models\SpcRuleSearch;
use app\models\SpcRansharingSearch;
use app\models\SctPortHuaweiSearch;
use app\models\MsrnRuleSearch;
use app\models\MsrnRoutingSearch;
use app\models\MsrnProposedlistSearch;
use app\models\PabxInfoSearch;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['logout', 'error', 'index','download', 'data', 'user', 'info'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login','error','download', 'index', 'data', 'user'],
                        'allow' => true,
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionData()
    {
        $this->layout = 'data';
        return $this->render('data');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionUser()
    {
        $this->layout = 'data';
        $model = new CreateAdmin();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }       
        return $this->render('user', [
            'model' => $model,
        ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionInfo()
    {
        $this->layout = 'data';
        $GRsearchModel = new GtRuleSearch();
        $GRdataProvider = $GRsearchModel->search(Yii::$app->request->queryParams);
        $GPsearchModel = new GtProposedlistSearch();
        $GPdataProvider = $GPsearchModel->search(Yii::$app->request->queryParams);
        $SRsearchModel = new SpcRuleSearch;
        $SRdataProvider = $SRsearchModel->search(Yii::$app->request->queryParams);
        $SRSsearchModel = new SpcRansharingSearch;
        $SRSdataProvider = $SRSsearchModel->search(Yii::$app->request->queryParams);
        $SPHsearchModel = new SctPortHuaweiSearch;
        $SPHdataProvider = $SPHsearchModel->search(Yii::$app->request->queryParams);
        $MRulesearchModel = new MsrnRuleSearch;
        $MRuledataProvider = $MRulesearchModel->search(Yii::$app->request->queryParams);
        $MRoutingsearchModel = new MsrnRoutingSearch;
        $MRoutingdataProvider = $MRoutingsearchModel->search(Yii::$app->request->queryParams);
        $MPsearchModel = new MsrnProposedlistSearch;
        $MPdataProvider = $MPsearchModel->search(Yii::$app->request->queryParams);
        $PIsearchModel = new PabxInfoSearch;
        $PIdataProvider = $PIsearchModel->search(Yii::$app->request->queryParams);

        return $this->render('info', [
            'GRdataProvider' => $GRdataProvider,
            'GPdataProvider' => $GPdataProvider,
            'SRdataProvider' => $SRdataProvider,
            'SRSdataProvider' => $SRSdataProvider,
            'SPHdataProvider' => $SPHdataProvider,
            'MRuledataProvider' => $MRuledataProvider,
            'MRoutingdataProvider' => $MRoutingdataProvider,
            'MPdataProvider' => $MPdataProvider,
            'PIdataProvider' => $PIdataProvider,
        ]);
    }

    public function actionDownload()
    {
        /* gather network element data */
        $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM network_element')->queryScalar();
        $NEdataProvider = new SqlDataProvider([
            'sql' => 'SELECT *  FROM network_element',
            'totalCount' => $count,
            'pagination' => ['pageSize' => $count,],
        ]);

        /* gather opc data */
        $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM desc_network')->queryScalar();
        $OPCdataProvider = new SqlDataProvider([
            'sql' => 'SELECT *  FROM desc_network',
            'totalCount' => $count,
            'pagination' => ['pageSize' => $count,],
        ]);

        /* gather msc data */
        $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM msc')->queryScalar();
        $MSCdataProvider = new SqlDataProvider([
            'sql' => 'SELECT *  FROM msc',
            'totalCount' => $count,
            'pagination' => ['pageSize' => $count,],
        ]);

        /* gather mgw data */
        $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM mgw')->queryScalar();
        $MGWdataProvider = new SqlDataProvider([
            'sql' => 'SELECT *  FROM mgw',
            'totalCount' => $count,
            'pagination' => ['pageSize' => $count,],
        ]);

        /* gather rnc data */
        $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM rnc_reference')->queryScalar();
        $RNCdataProvider = new SqlDataProvider([
            'sql' => 'SELECT *  FROM rnc_reference',
            'totalCount' => $count,
            'pagination' => ['pageSize' => $count,],
        ]);

         /* gather trunk voip data */
        $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM trunk_voip')->queryScalar();
        $TVdataProvider = new SqlDataProvider([
            'sql' => 'SELECT *  FROM trunk_voip',
            'totalCount' => $count,
            'pagination' => ['pageSize' => $count,],
        ]);

         /* gather trunk interkoneksi data */
        $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM trunk_interkoneksi')->queryScalar();
        $TIdataProvider = new SqlDataProvider([
            'sql' => 'SELECT *  FROM trunk_interkoneksi',
            'totalCount' => $count,
            'pagination' => ['pageSize' => $count,],
        ]);

        return $this->render('download', [
            'NEdataProvider' => $NEdataProvider,
            'OPCdataProvider' => $OPCdataProvider,
            'MSCdataProvider' => $MSCdataProvider,
            'MGWdataProvider' => $MGWdataProvider,
            'RNCdataProvider' => $RNCdataProvider,
            'TIdataProvider' => $TIdataProvider,
            'TVdataProvider' => $TVdataProvider,
        ]);
    }
}
