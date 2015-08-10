<?php

namespace app\controllers;

use Yii;
use app\models\TrunkVoip;
use app\models\TrunkVoipSearch;
use app\models\NetworkElement;
use app\models\NetworkElementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * TrunkvoipController implements the CRUD actions for TrunkVoip model.
 */
class TrunkvoipController extends Controller
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
     * Lists all TrunkVoip models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrunkVoipSearch();
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
        $listMgw = NetworkElement::listMgw();
        $listMsc = NetworkElement::listMsc();
        $option = ['Dismantle', 'In Service', 'Plan', 'Trial'];

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $this->fillmodel($model);
            return $this->redirect(['view', 'id' => $model->trunk_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'listMgw' => $listMgw,
                'listMsc' => $listMsc,
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
        $listMgw = NetworkElement::listMgw();
        $listMsc = NetworkElement::listMsc();
        $option = ['Dismantle', 'In Service', 'Plan', 'Trial'];
        $this->convertDropDown($model);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->fillmodel($model);
            return $this->redirect(['view', 'id' => $model->trunk_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'listMgw' => $listMgw,
                'listMsc' => $listMsc,
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

    public function fillModel($model)
    {
        $listMgw = NetworkElement::listMgw();
        $listMsc = NetworkElement::listMsc();
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
        $model->mgw = $listMgw[$model->mgw];
        $model->mss = $listMsc[$model->mss];
        $model->log_date = date('Y-m-d');
        $model->save();
    }

    public function convertDropDown($model)
    {
        $listMgw = NetworkElement::listMgw();
        $listMsc = NetworkElement::listMsc();
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
        $model->mgw = array_search($model->mgw, $listMgw);
        $model->mss = array_search($model->mss, $listMsc);
    }
}
