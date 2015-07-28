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
                        'actions' => ['logout', 'error', 'index','download', 'user', 'info', 'dashboard', 'topology'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login', 'error', 'download', 'index', 'dashboard', 'topology'],
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
        return $this->render('index', [
            'newsList' => $newsList,
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
            'SELECT pool as name, COUNT(*) as MSC, vendor FROM msc, network_element WHERE pool != "" AND network_element_id = msc_name group by pool order by MSC DESC')->queryAll();
        $MSCpool = array();
        foreach ($temp as $key => $value) {
            $MSCpool[$key] = [$value['name'].' ('.$value['vendor'].')', (int)$value['MSC']] ;
        }

        $temp = Yii::$app->db->createCommand(
            'SELECT pool as name, COUNT(*) as MGW, vendor FROM mgw, network_element WHERE pool != "" AND network_element_id = mgw_name group by pool order by MGW DESC')->queryAll();
        $MGWpool = array();
        foreach ($temp as $key => $value) {
            $MGWpool[$key] = [$value['name'].' ('.$value['vendor'].')', (int)$value['MGW']] ;
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

    public function actionTopology()
    {
        $model = new DynamicModel([
            'file_id'
        ]);
     
        // behavior untuk upload file
        $model->attachBehavior('upload', [
            'class' => 'mdm\upload\UploadBehavior',
            'attribute' => 'file',
            'savedAttribute' => 'file_id', 
            //'uploadPath' => Yii::$app->homeUrl.'/files',
        ]);   
     
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->saveUploadedFile() !== false) {
                if ($model->file_id !== NULL && $model->file_id !== '')
                    Yii::$app->db->createCommand('UPDATE uploaded_file SET type = "slider" WHERE id = '.$model->file_id)->execute();
                Yii::$app->session->setFlash('success', 'Upload Success');
            }
        }
        return $this->render('topology',['model' => $model]);
    }

    public function actionDeletetopology($id)
    {
        Yii::$app->db->createCommand('DELETE FROM uploaded_file WHERE id = '.$id)->execute();
        return $this->redirect(['topology']);
    }
}
