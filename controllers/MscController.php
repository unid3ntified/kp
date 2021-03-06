<?php

namespace app\controllers;

use Yii;
use app\models\Msc;
use app\models\MscSearch;
use app\models\NetworkElement;
use app\models\NetworkElementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * MscController implements the CRUD actions for Msc model.
 */
class MscController extends Controller
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
     * Lists all Msc models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MscSearch();
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
     * Displays a single Msc model.
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
     * Creates a new Msc model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Msc();
        $listData = NetworkElement::listMsc();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            $valid = $this->fillModel($model);
            if ($valid)
            {
                return $this->redirect(['view', 'id' => $model->msc_name]);
            }
            else 
            {
                $this->convertDropDown($model);
                return $this->render('create', [
                    'model' => $model,
                    'listData' => $listData,
                ]);
            }
        }
        else 
        {
            return $this->render('create', [
                'model' => $model,
                'listData' => $listData,
            ]);
        }
    }

    /**
     * Updates an existing Msc model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $listData = NetworkElement::listMsc();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            $valid = $this->fillModel($model);
            if ($valid)
            {
                return $this->redirect(['view', 'id' => $model->msc_name]);
            }
            else 
            {
                $this->convertDropDown($model);
                return $this->render('update', [
                    'model' => $model,
                    'listData' => $listData,
                ]);
            }
        } 
        else 
        {
            return $this->render('update', [
                'model' => $model,
                'listData' => $listData,
            ]);
        }
    }

    /**
     * Deletes an existing Msc model.
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
     * Finds the Msc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Msc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Msc::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function fillModel($model)
    {
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
        if ($model->cnid == '')
                $model->cnid = NULL;
        if($model->mgw_proxyA_flex == 0)
            $model->mgw_proxyA_flex = 'No';
        else
            $model->mgw_proxyA_flex = 'Yes';

        if($model->mgw_managerA_circuit == 0)
            $model->mgw_managerA_circuit = 'No';
        else
            $model->mgw_managerA_circuit = 'Yes';
        $model->log_date = date('Y-m-d');
        $model->msc_name = $listMsc[$model->msc_name];
        return $model->save();
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
        if($model->mgw_proxyA_flex == 'No')
            $model->mgw_proxyA_flex = 0;
        else
            $model->mgw_proxyA_flex = 1;

        if($model->mgw_managerA_circuit == 'No')
            $model->mgw_managerA_circuit = 0;
        else
            $model->mgw_managerA_circuit = 1;

        $listMsc = NetworkElement::listMsc();
        $model->msc_name = array_search($model->msc_name, $listMsc);
    }
}
