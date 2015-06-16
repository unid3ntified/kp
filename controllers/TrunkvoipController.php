<?php

namespace app\controllers;

use Yii;
use app\models\TrunkVoip;
use app\models\TrunkVoipSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TrunkvoipController implements the CRUD actions for TrunkVoip model.
 */
class TrunkvoipController extends Controller
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
     * Lists all TrunkVoip models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrunkVoipSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TrunkVoip model.
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
     * Creates a new TrunkVoip model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TrunkVoip();
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
            return $this->redirect(['view', 'id' => $model->trunk]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'option' => $option,
            ]);
        }
    }

    /**
     * Updates an existing TrunkVoip model.
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
            return $this->redirect(['view', 'id' => $model->trunk]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'option' => $option,
            ]);
        }
    }

    /**
     * Deletes an existing TrunkVoip model.
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
     * Finds the TrunkVoip model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TrunkVoip the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TrunkVoip::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
