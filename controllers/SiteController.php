<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\SqlDataProvider;
use app\models\News;
use yii\base\DynamicModel;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['logout', 'error', 'index','download', 'user', 'info', 'dashboard'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login', 'error', 'download', 'index', 'dashboard'],
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
        $newsList = News::find()->all();
        $data = Yii::$app->db->createCommand('SELECT id FROM uploaded_file WHERE type = "slider"')->queryAll();
        return $this->render('index', [
            'newsList' => $newsList,
            'data' => $data,
        ]);
    }

    public function actionDashboard()
    {
        //data for top widget
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

        $temp = Yii::$app->db->createCommand('SELECT vendor as name, COUNT(*) as count FROM network_element, mgw where mgw_name = network_element_id group by vendor')->queryAll();
        $vendorMGW = array();
        foreach ($temp as $key => $value) {
            $vendorMGW[$key] = [$value['name'], (int)$value['count']] ;
        }

        $temp = Yii::$app->db->createCommand(
            'SELECT pool as name, COUNT(*) as MSC, vendor FROM msc, network_element WHERE pool != "" AND network_element_id = msc_name group by pool, vendor order by MSC DESC')->queryAll();
        $MSCpool = array();
        foreach ($temp as $key => $value) {
            $MSCpool[$key] = [$value['name'].' ('.$value['vendor'].')', (int)$value['MSC']];
        }

        $temp = Yii::$app->db->createCommand(
            'SELECT pool as name, COUNT(*) as MGW, vendor FROM mgw, network_element WHERE pool != "" AND network_element_id = mgw_name group by pool, vendor order by MGW DESC')->queryAll();
        $MGWpool = array();
        foreach ($temp as $key => $value) {
            $MGWpool[$key] = [$value['name'].' ('.$value['vendor'].')', (int)$value['MGW']];
        }

        //combining pool from both msc and mgw table
        $pool = array();
        $tempMsc = array();
        $tempMgw = array();
        for ($i = 0; $i<count($MSCpool); $i++)
        {
            array_push($pool,$MSCpool[$i][0]);
            array_push($tempMsc,$MSCpool[$i][0]);
        }
        for ($i = 0; $i<count($MGWpool); $i++)
        {
            array_push($tempMgw,$MGWpool[$i][0]);
            if (!in_array($MGWpool[$i][0], $pool))
                array_push($pool,$MGWpool[$i][0]);
        }

        //adding pool that exist in combined pool, but not in msc/mgw
        for ($i = 0; $i<count($pool); $i++)
        {
            if (!in_array($pool[$i], $tempMsc))
                array_push($MSCpool,[$pool[$i],NULL]);    
        }
        for ($i = 0; $i<count($pool); $i++)
        {
            if (!in_array($pool[$i], $tempMgw))
                array_push($MGWpool,[$pool[$i],NULL]);    
        }
        sort($MSCpool);
        sort($MGWpool);
        
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

        $temp = Yii::$app->db->createCommand('SELECT region as name, vendor, sum(subs_capacity)/1000 as cap1, sum(bhca_capacity)/1000 as cap2, sum(erlang_capacity)/1000 as cap3 FROM network_element, msc_cap_dimensioning WHERE network_element_id = node_id group by region, vendor order by cap2 DESC')->queryAll();
        $subsCapacity = array();
        $BHCACapacity = array();
        $erlangCapacity = array();
        foreach ($temp as $key => $value) {
            $subsCapacity[$key] = [$value['name'].' ('.$value['vendor'].')', (int)$value['cap1']];
            $BHCACapacity[$key] = [$value['name'].' ('.$value['vendor'].')', (int)$value['cap2']];
            $erlangCapacity[$key] = [$value['name'].' ('.$value['vendor'].')', (int)$value['cap3']];
        }

        $temp = Yii::$app->db->createCommand('SELECT vendor, sum(subs_capacity) as cap1, sum(bhca_capacity) as cap2, sum(erlang_capacity) as cap3 FROM network_element, msc_cap_dimensioning WHERE network_element_id = node_id group by vendor')->queryAll();
        $subsVendor = array();
        $BHCAVendor = array();
        $erlangVendor = array();
        foreach ($temp as $key => $value) {
            $subsVendor[$key] = [$value['vendor'], (int)$value['cap1']];
            $BHCAVendor[$key] = [$value['vendor'], (int)$value['cap2']];
            $erlangVendor[$key] = [$value['vendor'], (int)$value['cap3']];
        }

        //passing all variable to view class
        return $this->render('dashboard', [
                'NEcount' => $NEcount,
                'NEvendor' => $NEvendor,
                'vendorNE' => $vendorNE,
                'vendorMSC' => $vendorMSC,
                'vendorMGW' => $vendorMGW,
                'MSCvendor' => $MSCvendor,
                'MSCpool' => $MSCpool,
                'MGWpool' => $MGWpool,
                'partnerPOI' => $partnerPOI,
                'partnerVOIP' => $partnerVOIP,
                'MSCcount' => $MSCcount,
                'MGWcount' => $MGWcount,
                'Partnercount' => $Partnercount,
                'PartnerPOIcount' => $PartnerPOIcount,
                'SGSNcount' => $SGSNcount,
                'HLRcount' => $HLRcount,
                'POIcount' => $POIcount,
                'subsCapacity' => $subsCapacity,
                'BHCACapacity' => $BHCACapacity,
                'erlangCapacity' => $erlangCapacity,
                'subsVendor' => $subsVendor,
                'BHCAVendor' => $BHCAVendor,
                'erlangVendor' => $erlangVendor,
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
        $NEdataProvider = new SqlDataProvider([
            'sql' => 'SELECT *  FROM network_element',
            'pagination' => FALSE,
        ]);

        /* gather opc data */
        $OPCdataProvider = new SqlDataProvider([
            'sql' => 'SELECT *  FROM desc_network',
            'pagination' => FALSE,
        ]);

        /* gather msc data */
        $MSCdataProvider = new SqlDataProvider([
            'sql' => 'SELECT *  FROM msc',
            'pagination' => FALSE,
        ]);

        /* gather mgw data */
        $MGWdataProvider = new SqlDataProvider([
            'sql' => 'SELECT *  FROM mgw',
            'pagination' => FALSE,
        ]);


        /* gather bsc data */
        $BSCdataProvider = new SqlDataProvider([
            'sql' => 'SELECT *  FROM bsc',
            'pagination' => FALSE,
        ]);

        /* gather rnc data */
        $RNCdataProvider = new SqlDataProvider([
            'sql' => 'SELECT *  FROM rnc_reference',
            'pagination' => FALSE,
        ]);

         /* gather trunk voip data */
        $TVdataProvider = new SqlDataProvider([
            'sql' => 'SELECT *  FROM trunk_voip',
            'pagination' => FALSE,
        ]);

         /* gather trunk interkoneksi data */
        $TIdataProvider = new SqlDataProvider([
            'sql' => 'SELECT *  FROM trunk_interkoneksi',
            'pagination' => FALSE,
        ]);

        return $this->render('download', [
            'NEdataProvider' => $NEdataProvider,
            'OPCdataProvider' => $OPCdataProvider,
            'MSCdataProvider' => $MSCdataProvider,
            'MGWdataProvider' => $MGWdataProvider,
            'BSCdataProvider' => $BSCdataProvider,
            'RNCdataProvider' => $RNCdataProvider,
            'TIdataProvider' => $TIdataProvider,
            'TVdataProvider' => $TVdataProvider,
        ]);
    }

}
