<?php

namespace app\controllers;

use Yii;
use app\models\RncReference;
use app\models\RncReferenceSearch;
use app\models\NetworkElement;
use app\models\NetworkElementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * RncreferenceController implements the CRUD actions for RncReference model.
 */
class RncreferenceController extends Controller
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
     * Lists all RncReference models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RncReferenceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $downloadProvider = $searchModel->search(Yii::$app->request->queryParams);
        $downloadProvider->setPagination(false);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'downloadProvider' => $downloadProvider,
        ]);
    }

    /**
     * Displays a single RncReference model.
     * @param string $rnc_name
     * @param string $mgw_name
     * @return mixed
     */
    public function actionView($rnc_id, $mgw_name)
    {
        return $this->render('view', [
            'model' => $this->findModel($rnc_id, $mgw_name),
        ]);
    }

    /**
     * Creates a new RncReference model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RncReference();
        $option = ['Dismantle', 'In Service', 'Plan', 'Trial'];
        $listData = ArrayHelper::map(NetworkElement::find()->asArray()->all(), 'network_element_id', 'network_element_id');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->fillModel($model);
            return $this->redirect(['view', 'rnc_id' => $model->rnc_id, 'mgw_name' => $model->mgw_name]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'listData' => $listData,
                'option' => $option,
            ]);
        }
    }

    /**
     * Updates an existing RncReference model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $rnc_name
     * @param string $mgw_name
     * @return mixed
     */
    public function actionUpdate($rnc_id, $mgw_name)
    {
        $model = $this->findModel($rnc_id, $mgw_name);
        $option = ['Dismantle', 'In Service', 'Plan', 'Trial'];
        $listData = ArrayHelper::map(NetworkElement::find()->asArray()->all(), 'network_element_id', 'network_element_id');
        $this->convertDropDown($model);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->fillModel($model);
            return $this->redirect(['view', 'rnc_id' => $model->rnc_id, 'mgw_name' => $model->mgw_name]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'listData' => $listData,
                'option' => $option,
            ]);
        }
    }

    /**
     * Deletes an existing RncReference model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $rnc_name
     * @param string $mgw_name
     * @return mixed
     */
    public function actionDelete($rnc_id, $mgw_name)
    {
        $this->findModel($rnc_id, $mgw_name)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RncReference model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $rnc_name
     * @param string $mgw_name
     * @return RncReference the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($rnc_id, $mgw_name)
    {
        if (($model = RncReference::findOne(['rnc_id' => $rnc_id, 'mgw_name' => $mgw_name])) !== null) {
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
