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
        $downloadProvider = $searchModel->search(Yii::$app->request->queryParams);
        $downloadProvider->setPagination(false);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'downloadProvider' => $downloadProvider,
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
        $listBsc = NetworkElement::listBsc();
        $listMgw = NetworkElement::listMgw();

       if ($model->load(Yii::$app->request->post()) && $model->validate()) 
       {
            $valid = $this->fillModel($model);
            if ($valid)
            {
                return $this->redirect(['view', 'bsc_id' => $model->bsc_id, 'mgw' => $model->mgw]);
            }
            else 
            {
                $this->convertDropDown($model);
                return $this->render('create', [
                    'model' => $model,
                    'listBsc' => $listBsc,
                    'listMgw' => $listMgw,
                ]);
            }          
        } 
        else 
        {
            return $this->render('create', [
                'model' => $model,
                'listBsc' => $listBsc,
                'listMgw' => $listMgw,
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
        $listBsc = NetworkElement::listBsc();
        $listMgw = NetworkElement::listMgw();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            $valid = $this->fillModel($model);
            if ($valid)
            {
                return $this->redirect(['view', 'bsc_id' => $model->bsc_id, 'mgw' => $model->mgw]);
            }
            else 
            {
                $this->convertDropDown($model);
                return $this->render('update', [
                    'model' => $model,
                    'listBsc' => $listBsc,
                    'listMgw' => $listMgw,
                ]);
            }
        } 
        else 
        {
            return $this->render('update', [
                'model' => $model,
                'listBsc' => $listBsc,
                'listMgw' => $listMgw,
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
        $listMgw = NetworkElement::listMgw();
        $listBsc = NetworkElement::listBsc();
        $model->log_date = date('Y-m-d');
        if ($model->trunk_name == '')
            $model->trunk_name = NULL;
        $model->mgw = $listMgw[$model->mgw];
        $model->bsc_id = $listBsc[$model->bsc_id];
        return $model->save();
    }

    public function convertDropDown($model)
    {
        $listMgw = NetworkElement::listMgw();
        $listBsc = NetworkElement::listBsc();
        $model->mgw = array_search($model->mgw, $listMgw);
        $model->bsc_id = array_search($model->bsc_id, $listBsc);
    }
}
