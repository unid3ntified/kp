<?php

namespace app\controllers;

use Yii;
use app\models\SpcAddress;
use app\models\SpcAddressSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SpcaddressController implements the CRUD actions for SpcAddress model.
 */
class SpcaddressController extends Controller
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
     * Lists all SpcAddress models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SpcAddressSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    

    /**
     * Displays a single SpcAddress model.
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
     * Creates a new SpcAddress model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SpcAddress();
        $option = ['Dismantle', 'In service', 'Plan', 'Trial'];
        $prov = ['Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Kep. Riau', 'Jambi', 'Sumatera Selatan', 'Kep. Bangka Belitung', 'Bengkulu', 
        'Lampung', 'DKI Jakarta', 'Banten', 'Jawa Barat', 'Jawa Tengah', 'DI Yogyakarta', 'Jawa Timur', 'Bali', 'NTB', 'NTT', 'Kalimantan Barat', 
        'Kalimantan Tengah', 'Kalimantan Selatan', 'Kalimantan Timur', 'Kalimantan Utara', 'Sulawesi Utara', 'Gorontalo', 'Sulawesi Tengah', 
        'Sulawesi Barat', 'Sulawesi Selatan', 'Sulawesi Tenggara', 'Maluku', 'Maluku Utara', 'Papua Barat', 'Papua'];

        if ($model->load(Yii::$app->request->post())) {
            fillModel($model);
            return $this->redirect(['view', 'id' => $model->network_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'option' => $option,
                'prov' => $prov,
            ]);
        }
    }

    /**
     * Updates an existing SpcAddress model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $option = ['Dismantle', 'In service', 'Plan', 'Trial'];
        $prov = ['Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Kep. Riau', 'Jambi', 'Sumatera Selatan', 'Kep. Bangka Belitung', 'Bengkulu', 
        'Lampung', 'DKI Jakarta', 'Banten', 'Jawa Barat', 'Jawa Tengah', 'DI Yogyakarta', 'Jawa Timur', 'Bali', 'NTB', 'NTT', 'Kalimantan Barat', 
        'Kalimantan Tengah', 'Kalimantan Selatan', 'Kalimantan Timur', 'Kalimantan Utara', 'Sulawesi Utara', 'Gorontalo', 'Sulawesi Tengah', 
        'Sulawesi Barat', 'Sulawesi Selatan', 'Sulawesi Tenggara', 'Maluku', 'Maluku Utara', 'Papua Barat', 'Papua'];

       if ($model->load(Yii::$app->request->post())) {
            fillModel($model);
            return $this->redirect(['view', 'id' => $model->network_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'option' => $option,
                'prov' => $prov,
            ]);
        }
    }

    /**
     * Deletes an existing SpcAddress model.
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
     * Finds the SpcAddress model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SpcAddress the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SpcAddress::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function fillModel($model)
    {
            switch($model->status)
            {
                case ("1"):
                    $model->status = "Dismantle";
                    break;
                case ("2"):
                    $model->status = "In service";
                    break;
                case ("3"):
                    $model->status = "Plan";
                    break;
                case ("4"):
                    $model->status = "Trial";
                    break;
            }

            switch($model->provinsi)
            {
                case ("1"):
                    $model->provinsi = "Aceh";
                    break;
                case ("2"):
                    $model->provinsi = "Sumatera Utara";
                    break;
                case ("3"):
                    $model->provinsi = "Sumatera Barat";
                    break;
                case ("4"):
                    $model->provinsi = "Riau";
                    break;
                case ("5"):
                    $model->provinsi = "Kep. Riau";
                    break;
                case ("6"):
                    $model->provinsi = "Jambi";
                    break;
                case ("7"):
                    $model->provinsi = "Sumatera Selatan";
                    break;
                case ("8"):
                    $model->provinsi = "Kep. Bangka Belitung";
                    break;
                case ("9"):
                    $model->provinsi = "Bengkulu";
                    break;
                case ("10"):
                    $model->provinsi = "Lampung";
                    break;
                case ("11"):
                    $model->provinsi = "DKI Jakarta";
                    break;
                case ("12"):
                    $model->provinsi = "Banten";
                    break;
                case ("13"):
                    $model->provinsi = "Jawa Barat";
                    break;
                case ("14"):
                    $model->provinsi = "Jawa Tengah";
                    break;
                case ("15"):
                    $model->provinsi = "DI Yogyakarta";
                    break;
                case ("16"):
                    $model->provinsi = "Jawa Timur";
                    break;
                case ("17"):
                    $model->provinsi = "Bali";
                    break;
                case ("18"):
                    $model->provinsi = "NTB";
                    break;
                case ("19"):
                    $model->provinsi = "NTT";
                    break;
                case ("20"):
                    $model->provinsi = "Kalimantan Barat";
                    break;
                case ("21"):
                    $model->provinsi = "Kalimantan Tengah";
                    break;
                case ("22"):
                    $model->provinsi = "Kalimantan Selatan";
                    break;
                case ("23"):
                    $model->provinsi = "Kalimantan TImur";
                    break;
                case ("24"):
                    $model->provinsi = "Kalimantan Utara";
                    break;
                case ("25"):
                    $model->provinsi = "Sulawesi Utara";
                    break;
                case ("26"):
                    $model->provinsi = "Gorontalo";
                    break;
                case ("27"):
                    $model->provinsi = "Sulawesi Tengah";
                    break;
                case ("28"):
                    $model->provinsi = "Sulawesi Barat";
                    break;
                case ("29"):
                    $model->provinsi = "Sulawesi Selatan";
                    break;
                case ("30"):
                    $model->provinsi = "Sulawesi Tenggara";
                    break;
                case ("31"):
                    $model->provinsi = "Maluku";
                    break;
                case ("32"):
                    $model->provinsi = "Maluku Utara";
                    break;
                case ("33"):
                    $model->provinsi = "Papua Barat";
                    break;
                case ("34"):
                    $model->provinsi = "Papua";
                    break;
            }

            $model->log_date = date('Y-m-d');

            $model->save();

    }
}
