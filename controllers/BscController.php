<?php

namespace app\controllers;

use Yii;
use app\models\Bsc;
use app\models\BscSearch;
use app\models\NetworkElement;
use app\models\NetworkElementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * BscController implements the CRUD actions for Bsc model.
 */
class BscController extends Controller
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
     * Lists all Bsc models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BscSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bsc model.
     * @param string $bsc_id
     * @param string $mgw
     * @return mixed
     */
    public function actionView($bsc_id, $mgw)
    {
        return $this->render('view', [
            'model' => $this->findModel($bsc_id, $mgw),
        ]);
    }

    /**
     * Creates a new Bsc model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bsc();
        $listData = ArrayHelper::map(NetworkElement::find()->asArray()->all(), 'network_element_id', 'network_element_id');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->fillModel($model);
            return $this->redirect(['view', 'bsc_id' => $model->bsc_id, 'mgw' => $model->mgw]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'listData' => $listData,
            ]);
        }
    }

    /**
     * Updates an existing Bsc model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $bsc_id
     * @param string $mgw
     * @return mixed
     */
    public function actionUpdate($bsc_id, $mgw)
    {
        $model = $this->findModel($bsc_id, $mgw);
        $this->convertDropDown($model);
        $listData = ArrayHelper::map(NetworkELement::find()->asArray()->all(), 'network_element_id', 'network_element_id');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'bsc_id' => $model->bsc_id, 'mgw' => $model->mgw]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'listData' => $listData,
            ]);
        }
    }

    /**
     * Deletes an existing Bsc model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $bsc_id
     * @param string $mgw
     * @return mixed
     */
    public function actionDelete($bsc_id, $mgw)
    {
        $this->findModel($bsc_id, $mgw)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bsc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $bsc_id
     * @param string $mgw
     * @return Bsc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($bsc_id, $mgw)
    {
        if (($model = Bsc::findOne(['bsc_id' => $bsc_id, 'mgw' => $mgw])) !== null) {
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
                $model->status = "In Service";
                break;
            case ("2"):
                $model->status = "Plan";
                break;
            case ("3"):
                $model->status = "Trial";
                break;
        }
        $model->log_date = date('Y-m-d');
        if ($model->trunk_name == '')
            $model->trunk_name = NULL;
        $model->save();
    }

    public function convertDropDown($model)
    {
         switch($model->status)
        {
            case ("Dismantle"):
                $model->status = "0";
                break;
            case ("In Service"):
                $model->status = "1";
                break;
            case ("Plan"):
                $model->status = "2";
                break;
            case ("Trial"):
                $model->status = "3";
                break;
        }
    }
}
