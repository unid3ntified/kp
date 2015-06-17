<?php

namespace app\controllers;

use Yii;
use app\models\MgwBcuId;
use app\models\BcuId;
use app\models\MgwBcuIdSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * mgw_nameBcuIdController implements the CRUD actions for mgw_nameBcuId model.
 */
class MgwbcuidController extends Controller
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
     * Lists all mgw_nameBcuId models.
     * @return mixed
     */
    public function actionIndex($mgw_name)
    {
        $searchModel = new MgwBcuIdSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider = $searchModel->search($mgw_name);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'mgw_name' => $mgw_name,
        ]);
    }

    public function actionBcuindex()
    {
        $searchModel = new MgwBcuIdSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('bcuindex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single mgw_nameBcuId model.
     * @param string $bcu_id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new mgw_nameBcuId model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($mgw_name)
    {
        $model = new MgwBcuId();
        $model->mgw_name = $mgw_name;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $temp = BcuId::findOne($mgw_name);
            $temp->log_date = date('Y-m-d');
            $temp->save();
            return $this->redirect(['view', 'id' => $model->bcu_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing mgw_nameBcuId model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $bcu_id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $temp = BcuId::findOne($model->mgw_name);
            $temp->log_date = date('Y-m-d');
            $temp->save();
            return $this->redirect(['view', 'id' => $model->bcu_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing mgw_nameBcuId model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $bcu_id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $mgw_name = $this->findModel($id)->mgw_name;
        $this->findModel($id)->delete();

        return $this->redirect(['index', 'mgw_name' => $mgw_name]);
    }

    /**
     * Finds the mgw_nameBcuId model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $bcu_id
     * @return mgw_nameBcuId the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($bcu_id)
    {
        if (($model = MgwBcuId::findOne($bcu_id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
