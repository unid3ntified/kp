<?php

namespace app\controllers;

use Yii;
use app\models\TrunkInterkoneksi;
use app\models\TrunkInterkoneksiSearch;
use app\models\Poi;
use app\models\PoiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * TrunkinterkoneksiController implements the CRUD actions for TrunkInterkoneksi model.
 */
class TrunkinterkoneksiController extends Controller
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
     * Lists all TrunkInterkoneksi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrunkInterkoneksiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TrunkInterkoneksi model.
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
     * Creates a new TrunkInterkoneksi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TrunkInterkoneksi();
        $option = ['Dismantle', 'In service', 'Plan', 'Trial'];
        $listData = ArrayHelper::map(Poi::find()->asArray()->all(), 'poi', 'poi');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->fillmodel($model);
            return $this->redirect(['view', 'id' => $model->trunk_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'option' => $option,
                'listData' => $listData,
            ]);
        }
    }

    /**
     * Updates an existing TrunkInterkoneksi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $this->convertDropDown($model);
        $option = ['Dismantle', 'In service', 'Plan', 'Trial'];
        $listData = ArrayHelper::map(Poi::find()->asArray()->all(), 'poi', 'poi');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->fillmodel($model);
            return $this->redirect(['view', 'id' => $model->trunk_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'option' => $option,
                'listData' => $listData,
            ]);
        }
    }

    /**
     * Deletes an existing TrunkInterkoneksi model.
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
     * Finds the TrunkInterkoneksi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TrunkInterkoneksi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TrunkInterkoneksi::findOne($id)) !== null) {
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
    }
}
