<?php

namespace app\controllers;

use Yii;
use app\models\NetworkElement;
use app\models\NetworkElementSearch;
//use app\models\DescNetwork;
//use app\models\DescNetworkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NetworkelementController implements the CRUD actions for NetworkElement model.
 */
class NetworkelementController extends Controller
{
    public function behaviors()
    {
        return [
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
        return $this->render('view', [
            'model' => $this->findModel($id),
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
        $option = ['Dismantle', 'In service', 'Plan', 'Trial'];
        $prov = ['Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Kep. Riau', 'Jambi', 'Sumatera Selatan', 'Kep. Bangka Belitung', 'Bengkulu', 
        'Lampung', 'DKI Jakarta', 'Banten', 'Jawa Barat', 'Jawa Tengah', 'DI Yogyakarta', 'Jawa Timur', 'Bali', 'NTB', 'NTT', 'Kalimantan Barat', 
        'Kalimantan Tengah', 'Kalimantan Selatan', 'Kalimantan Timur', 'Kalimantan Utara', 'Sulawesi Utara', 'Gorontalo', 'Sulawesi Tengah', 
        'Sulawesi Barat', 'Sulawesi Selatan', 'Sulawesi Tenggara', 'Maluku', 'Maluku Utara', 'Papua Barat', 'Papua'];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->fillmodel($model);
            //$model2->network_id = $model->network_id;
            //$model2->save();
            return $this->redirect(['view', 'id' => $model->network_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                //'model2' => $model2,
                'option' => $option,
                'prov' => $prov,
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
        //$model2 = new DescNetwork();
        $option = ['Dismantle', 'In service', 'Plan', 'Trial'];
        $prov = ['Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Kep. Riau', 'Jambi', 'Sumatera Selatan', 'Kep. Bangka Belitung', 'Bengkulu', 
        'Lampung', 'DKI Jakarta', 'Banten', 'Jawa Barat', 'Jawa Tengah', 'DI Yogyakarta', 'Jawa Timur', 'Bali', 'NTB', 'NTT', 'Kalimantan Barat', 
        'Kalimantan Tengah', 'Kalimantan Selatan', 'Kalimantan Timur', 'Kalimantan Utara', 'Sulawesi Utara', 'Gorontalo', 'Sulawesi Tengah', 
        'Sulawesi Barat', 'Sulawesi Selatan', 'Sulawesi Tenggara', 'Maluku', 'Maluku Utara', 'Papua Barat', 'Papua'];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->fillmodel($model);
            //$model2->network_id = $model->network_id;
            //$model2->save();
            return $this->redirect(['view', 'id' => $model->network_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                //'model2' => $model2,
                'option' => $option,
                'prov' => $prov,
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
                    $model->provinsi = "Kalimantan TImur";
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
            if ($model->sc_address == '')
                $model->sc_address = NULL;
            $model->log_date = date('Y-m-d');
            $model->save();
    }
}
