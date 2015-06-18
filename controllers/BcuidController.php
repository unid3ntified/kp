<?php

namespace app\controllers;

use Yii;
use app\models\BcuId;
use app\models\BcuIdSearch;
use app\models\NetworkElement;
use app\models\NetworkElementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * BcuidController implements the CRUD actions for BcuId model.
 */
class BcuidController extends Controller
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
     * Lists all BcuId models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BcuIdSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BcuId model.
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
     * Creates a new BcuId model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BcuId();
        $option = ['Dismantle', 'In service', 'Plan', 'Trial'];
        $listData = ArrayHelper::map(NetworkElement::find()->asArray()->all(), 'network_id', 'network_id');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->log_date = date('Y-m-d');
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
            $model->save();
            return $this->redirect(['view', 'id' => $model->bcu_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'listData' => $listData,
                'option' => $option,
            ]);
        }
    }

    /**
     * Updates an existing BcuId model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $option = ['Dismantle', 'In service', 'Plan', 'Trial'];
        $listData = ArrayHelper::map(NetworkELement::find()->asArray()->all(), 'network_id', 'network_id');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->log_date = date('Y-m-d');
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
            $model->save();
            return $this->redirect(['view', 'id' => $model->bcu_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'listData' => $listData,
                'option' => $option,
            ]);
        }
    }

    /**
     * Deletes an existing BcuId model.
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
     * Finds the BcuId model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return BcuId the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BcuId::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
