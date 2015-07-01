<?php

namespace app\controllers;

use Yii;
use app\models\NetworkElement;
use app\models\NetworkElementSearch;
use app\models\DescNetwork;
use app\models\DescNetworkSearch;
use app\models\BcuId;
use app\models\BcuIdSearch;
use app\models\Msc;
use app\models\MscSearch;
use app\models\RncReference;
use app\models\RncReferenceSearch;
use app\models\TrunkVoip;
use app\models\TrunkVoipSearch;
use app\models\TrunkInterkoneksi;
use app\models\TrunkInterkoneksiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * NetworkelementController implements the CRUD actions for NetworkElement model.
 */
class NetworkelementController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['create', 'update', 'index', 'view', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['view','index'],
                        'allow' => true,
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

    /**
     * Lists all NetworkElement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NetworkElementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NetworkElement model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $OpcSearchModel = new DescNetworkSearch();
        $OpcDataProvider = $OpcSearchModel->searchId(Yii::$app->request->queryParams, $id);
        $MscSearchModel = new MscSearch();
        $MscDataProvider = $MscSearchModel->searchId(Yii::$app->request->queryParams, $id);
        $BcuidSearchModel = new BcuIdSearch();
        $BcuidDataProvider = $BcuidSearchModel->searchId(Yii::$app->request->queryParams, $id);
        $RncSearchModel = new RncReferenceSearch();
        $RncDataProvider = $RncSearchModel->searchId(Yii::$app->request->queryParams, $id);
        $TVSearchModel = new TrunkVoipSearch();
        $TVDataProvider = $TVSearchModel->searchId(Yii::$app->request->queryParams, $id);

        $dataprovider = null;
        $flag = null;
        $mscmodel = null;
      

        if ($BcuidDataProvider->totalCount > 0)
        {
            $dataprovider = $BcuidDataProvider;
            $flag = 'BCU ID List';
        }

        else if ($MscDataProvider->totalCount > 0)
        {
            $dataprovider = $MscDataProvider;
            $flag = 'MSC Specification';
            $mscmodel = Msc::findOne($id);
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'OpcDataProvider' => $OpcDataProvider,
            'dataProvider' => $dataprovider,
            'flag' => $flag,
            'mscmodel' => $mscmodel,
            'TVDataProvider' => $TVDataProvider,
            'RncDataProvider' => $RncDataProvider,
        ]);

    }

    /**
     * Creates a new NetworkElement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NetworkElement();
        //$model2 = new DescNetwork();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->fillmodel($model);
            //$model2->network_id = $model->network_id;
            //$model2->save();
            return $this->redirect(['view', 'id' => $model->network_element_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                //'model2' => $model2,
            ]);
        }
    }

    /**
     * Updates an existing NetworkElement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $this->convertDropDown($model);
        //$model2 = new DescNetwork();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->fillmodel($model);
            //$model2->network_id = $model->network_id;
            //$model2->save();
            return $this->redirect(['view', 'id' => $model->network_element_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                //'model2' => $model2,
            ]);
        }
    }

    /**
     * Deletes an existing NetworkElement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NetworkElement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return NetworkElement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NetworkElement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function fillModel($model)
    {
        switch($model->status)
        {
            case ("0"):
                $model->status = "Dismantle";
                break;
            case ("1"):
                $model->status = "In service";
                break;
            case ("2"):
                $model->status = "Plan";
                break;
            case ("3"):
                $model->status = "Trial";
                break;
        }

        switch($model->provinsi)
        {
            case ("0"):
                $model->provinsi = "Aceh";
                break;
            case ("1"):
                $model->provinsi = "Sumatera Utara";
                break;
            case ("2"):
                $model->provinsi = "Sumatera Barat";
                break;
            case ("3"):
                $model->provinsi = "Riau";
                break;
            case ("4"):
                $model->provinsi = "Kep. Riau";
                break;
            case ("5"):
                $model->provinsi = "Jambi";
                break;
            case ("6"):
                $model->provinsi = "Sumatera Selatan";
                break;
            case ("7"):
                $model->provinsi = "Kep. Bangka Belitung";
                break;
            case ("8"):
                $model->provinsi = "Bengkulu";
                break;
            case ("9"):
                $model->provinsi = "Lampung";
                break;
            case ("10"):
                $model->provinsi = "DKI Jakarta";
                break;
            case ("11"):
                $model->provinsi = "Banten";
                break;
            case ("12"):
                $model->provinsi = "Jawa Barat";
                break;
            case ("13"):
                $model->provinsi = "Jawa Tengah";
                break;
            case ("14"):
                $model->provinsi = "DI Yogyakarta";
                break;
            case ("15"):
                $model->provinsi = "Jawa Timur";
                break;
            case ("16"):
                $model->provinsi = "Bali";
                break;
            case ("17"):
                $model->provinsi = "NTB";
                break;
            case ("18"):
                $model->provinsi = "NTT";
                break;
            case ("19"):
                $model->provinsi = "Kalimantan Barat";
                break;
            case ("20"):
                $model->provinsi = "Kalimantan Tengah";
                break;
            case ("21"):
                $model->provinsi = "Kalimantan Selatan";
                break;
            case ("22"):
                $model->provinsi = "Kalimantan Timur";
                break;
            case ("23"):
                $model->provinsi = "Kalimantan Utara";
                break;
            case ("24"):
                $model->provinsi = "Sulawesi Utara";
                break;
            case ("25"):
                $model->provinsi = "Gorontalo";
                break;
            case ("26"):
                $model->provinsi = "Sulawesi Tengah";
                break;
            case ("27"):
                $model->provinsi = "Sulawesi Barat";
                break;
            case ("28"):
                $model->provinsi = "Sulawesi Selatan";
                break;
            case ("29"):
                $model->provinsi = "Sulawesi Tenggara";
                break;
            case ("30"):
                $model->provinsi = "Maluku";
                break;
            case ("31"):
                $model->provinsi = "Maluku Utara";
                break;
            case ("32"):
                $model->provinsi = "Papua Barat";
                break;
            case ("33"):
                $model->provinsi = "Papua";
                break;
        }
        if ($model->gtt == '')
            $model->gtt = NULL;
        if ($model->gt_address == '')
            $model->gt_address = NULL;
        $model->log_date = date('Y-m-d');
        $model->save();
    }

    public function convertDropDown($model)
    {
        switch($model->status)
        {
            case ("Dismantle"):
                $model->status = "0";
                break;
            case ("In service"):
                $model->status = "1";
                break;
            case ("Plan"):
                $model->status = "2";
                break;
            case ("Trial"):
                $model->status = "3";
                break;
        }
        switch($model->provinsi)
        {
            case ("Aceh"):
                $model->provinsi = "0";
                break;
            case ("Sumatera Utara"):
                $model->provinsi = "1";
                break;
            case ("Sumatera Barat"):
                $model->provinsi = "2";
                break;
            case ("Riau"):
                $model->provinsi = "3";
                break;
            case ("Kep. Riau"):
                $model->provinsi = "4";
                break;
            case ("Jambi"):
                $model->provinsi = "5";
                break;
            case ("Sumatera Selatan"):
                $model->provinsi = "6";
                break;
            case ("Kep. Bangka Belitung"):
                $model->provinsi = "7";
                break;
            case ("Bengkulu"):
                $model->provinsi = "8";
                break;
            case ("Lampung"):
                $model->provinsi = "9";
                break;
            case ("DKI Jakarta"):
                $model->provinsi = "10";
                break;
            case ("Banten"):
                $model->provinsi = "11";
                break;
            case ("Jawa Barat"):
                $model->provinsi = "12";
                break;
            case ("Jawa Tengah"):
                $model->provinsi = "13";
                break;
            case ("DI Yogyakarta"):
                $model->provinsi = "14";
                break;
            case ("Jawa Timur"):
                $model->provinsi = "15";
                break;
            case ("Bali"):
                $model->provinsi = "16";
                break;
            case ("NTB"):
                $model->provinsi = "17";
                break;
            case ("NTT"):
                $model->provinsi = "18";
                break;
            case ("Kalimantan Barat"):
                $model->provinsi = "19";
                break;
            case ("Kalimantan Tengah"):
                $model->provinsi = "20";
                break;
            case ("Kalimantan Selatan"):
                $model->provinsi = "21";
                break;
            case ("Kalimantan Timur"):
                $model->provinsi = "22";
                break;
            case ("Kalimantan Utara"):
                $model->provinsi = "23";
                break;
            case ("Sulawesi Utara"):
                $model->provinsi = "24";
                break;
            case ("Gorontalo"):
                $model->provinsi = "25";
                break;
            case ("Sulawesi Tengah"):
                $model->provinsi = "26";
                break;
            case ("Sulawesi Barat"):
                $model->provinsi = "27";
                break;
            case ("Sulawesi Selatan"):
                $model->provinsi = "28";
                break;
            case ("Sulawesi Tenggara"):
                $model->provinsi = "29";
                break;
            case ("Maluku"):
                $model->provinsi = "30";
                break;
            case ("Maluku Utara"):
                $model->provinsi = "31";
                break;
            case ("Papua Barat"):
                $model->provinsi = "32";
                break;
            case ("Papua"):
                $model->provinsi = "33";
                break;
        }
    }
}
