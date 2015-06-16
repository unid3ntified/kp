<?php

namespace app\controllers;

use Yii;
use app\models\DummyNumber;
use app\models\DummyNumberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DummynumberController implements the CRUD actions for DummyNumber model.
 */
class DummynumberController extends Controller
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
     * Lists all DummyNumber models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DummyNumberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DummyNumber model.
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
     * Creates a new DummyNumber model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DummyNumber();
        $option = ['Dismentle', 'Inservice', 'Plan', 'Trial'];

       if ($model->load(Yii::$app->request->post())) {
            $temp = $model->status;
            $model->status = "";
            if (in_array("1", $temp))
                $model->status = $model->status."Dismentle, ";
            if (in_array("2", $temp))
                $model->status = $model->status."Inservice, ";
            if (in_array("3", $temp))
                $model->status = $model->status."Plan, ";
            if (in_array("4", $temp))
                $model->status = $model->status."Trial, ";
            $model->log_date = date('d-m-Y');
            $model->save();
            return $this->redirect(['view', 'id' => $model->name_msc]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'option' => $option,
            ]);
        }
    }

    /**
     * Updates an existing DummyNumber model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $option = ['Dismentle', 'Inservice', 'Plan', 'Trial'];

       if ($model->load(Yii::$app->request->post())) {
            $temp = $model->status;
            $model->status = "";
            if (in_array("1", $temp))
                $model->status = $model->status."Dismentle, ";
            if (in_array("2", $temp))
                $model->status = $model->status."Inservice, ";
            if (in_array("3", $temp))
                $model->status = $model->status."Plan, ";
            if (in_array("4", $temp))
                $model->status = $model->status."Trial, ";
            $model->save();
            return $this->redirect(['view', 'id' => $model->name_msc]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'option' => $option,
            ]);
        }
    }

    /**
     * Deletes an existing DummyNumber model.
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
     * Finds the DummyNumber model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return DummyNumber the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DummyNumber::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
