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

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['logout', 'error', 'index','download', 'user', 'info'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login','error','download', 'index'],
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
        $NEcount = Yii::$app->db->createCommand('SELECT COUNT(*) FROM network_element')->queryScalar();
        $MSCcount = Yii::$app->db->createCommand('SELECT COUNT(*) FROM msc')->queryScalar();
        $MGWcount = Yii::$app->db->createCommand('SELECT COUNT(*) FROM mgw')->queryScalar();
        $Partnercount = Yii::$app->db->createCommand('SELECT COUNT(*) FROM (select distinct partner from trunk_voip) as a')->queryScalar();
        $PartnerPOIcount = Yii::$app->db->createCommand('SELECT COUNT(*) FROM (select distinct t_group from trunk_interkoneksi) as a')->queryScalar();
        $SGSNcount = Yii::$app->db->createCommand('SELECT COUNT(*) FROM network_element WHERE network_element_id like "SGSN%" OR network_element_id like "%SGSN%" OR network_element_id like "%SGSN"')->queryScalar();
        $HLRcount = Yii::$app->db->createCommand('SELECT COUNT(*) FROM network_element WHERE network_element_id like "HLR%" OR network_element_id like "%HLR%" OR network_element_id like "%HLR"')->queryScalar();
        $POIcount = Yii::$app->db->createCommand('SELECT COUNT(*) FROM poi')->queryScalar();
        
        //convert sql query to dataprovider class
        $temp = Yii::$app->db->createCommand('SELECT vendor as name, COUNT(*) as count FROM network_element group by vendor')->queryAll();
        //initialize array
        $vendorNE = array();
        //map dataprovider to array & casting count to integer
        foreach ($temp as $key => $value) {
            $vendorNE[$key] = [$value['name'], (int)$value['count']] ;
        }

        $temp = Yii::$app->db->createCommand('SELECT COUNT(*) FROM (select distinct vendor from network_element) as a')->queryScalar();
        $NEvendor = (int)$temp;

        $temp = Yii::$app->db->createCommand('SELECT COUNT(*) FROM (select distinct vendor from network_element) as a')->queryScalar();
        $MSCvendor = (int)$temp;

        $temp = Yii::$app->db->createCommand('SELECT vendor as name, COUNT(*) as count FROM network_element, msc where msc_name = network_element_id group by vendor')->queryAll();
        $vendorMSC = array();
        foreach ($temp as $key => $value) {
            $vendorMSC[$key] = [$value['name'], (int)$value['count']] ;
        }

        $temp = Yii::$app->db->createCommand('SELECT pool as name, COUNT(*) as MSC FROM msc group by pool order by MSC DESC')->queryAll();
        $MSCpool = array();
        foreach ($temp as $key => $value) {
            $MSCpool[$key] = [$value['name'], (int)$value['MSC']] ;
        }

        $temp = Yii::$app->db->createCommand('SELECT pool as name, COUNT(*) as RNC FROM rnc_reference group by pool order by RNC DESC')->queryAll();
        $RNCpool = array();
        foreach ($temp as $key => $value) {
            $RNCpool[$key] = [$value['name'], (int)$value['RNC']] ;
        }

        $temp = Yii::$app->db->createCommand('SELECT t_group as name, COUNT(*) as Trunk FROM trunk_interkoneksi group by t_group order by Trunk DESC')->queryAll();
        $partnerPOI = array();
        foreach ($temp as $key => $value) {
            $partnerPOI[$key] = [$value['name'], (int)$value['Trunk']] ;
        }

        $temp = Yii::$app->db->createCommand('SELECT partner as name, COUNT(*) as Trunk FROM trunk_voip group by partner order by Trunk DESC')->queryAll();
        $partnerVOIP = array();
        foreach ($temp as $key => $value) {
            $partnerVOIP[$key] = [$value['name'], (int)$value['Trunk']] ;
        }

        //passing all variable to view class
        return $this->render('index', [
                'NEcount' => $NEcount,
                'NEvendor' => $NEvendor,
                'vendorNE' => $vendorNE,
                'vendorMSC' => $vendorMSC,
                'MSCvendor' => $MSCvendor,
                'MSCpool' => $MSCpool,
                'RNCpool' => $RNCpool,
                'partnerPOI' => $partnerPOI,
                'partnerVOIP' => $partnerVOIP,
                'MSCcount' => $MSCcount,
                'MGWcount' => $MGWcount,
                'Partnercount' => $Partnercount,
                'PartnerPOIcount' => $PartnerPOIcount,
                'SGSNcount' => $SGSNcount,
                'HLRcount' => $HLRcount,
                'POIcount' => $POIcount,
            ]);

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
