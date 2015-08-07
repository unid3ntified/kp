<?php

namespace app\controllers;

use Yii;
use app\models\Poi;
use app\models\PoiSearch;
use app\models\NetworkElement;
use app\models\NetworkElementSearch;
use app\models\TrunkInterkoneksi;
use app\models\TrunkInterkoneksiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * PoiController implements the CRUD actions for Poi model.
 */
class PoiController extends Controller
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
     * Lists all Poi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PoiSearch();
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
     * Displays a single Poi model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $TISearchModel = new TrunkInterkoneksiSearch();
        $TIDataProvider = $TISearchModel->searchId(Yii::$app->request->queryParams, $id);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'TIDataProvider' => $TIDataProvider,
        ]);
    }

    /**
     * Creates a new Poi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Poi();
        $listData = NetworkElement::listMsc();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->fillModel($model);
            return $this->redirect(['view', 'id' => $model->poi]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'listData' => $listData,
            ]);
        }
    }

    /**
     * Updates an existing Poi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $listData = NetworkElement::listMsc();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->fillModel($model);
            return $this->redirect(['view', 'id' => $model->poi]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'listData' => $listData,
            ]);
        }
    }

    /**
     * Deletes an existing Poi model.
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
     * Finds the Poi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Poi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Poi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     public function fillModel($model)
    {
        $model->log_date = date('Y-m-d');
        $model->save();
    }
}
