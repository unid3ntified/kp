<?php

namespace app\controllers;

use Yii;
use app\models\CapDimensioning;
use app\models\CapDimensioningSearch;
use app\models\NetworkElement;
use app\models\NetworkElementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * CapDimensioningController implements the CRUD actions for CapDimensioning model.
 */
class CapdimensioningController extends Controller
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
     * Lists all CapDimensioning models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CapDimensioningSearch();
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
     * Displays a single CapDimensioning model.
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
     * Creates a new CapDimensioning model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CapDimensioning();
        $listData = NetworkElement::listMsc();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            $valid = $this->fillModel($model);
            if ($valid)
            {
                return $this->redirect(['view', 'id' => $model->node_id]);
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
     * Updates an existing CapDimensioning model.
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
                return $this->redirect(['view', 'id' => $model->node_id]);
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
     * Deletes an existing CapDimensioning model.
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
     * Finds the CapDimensioning model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return CapDimensioning the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CapDimensioning::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function fillModel($model)
    {
        $listMsc = NetworkElement::listMsc();
        $model->node_id = $listMsc[$model->node_id];
        return $model->save();
    }

    public function convertDropDown($model)
    {
        $listMsc = NetworkElement::listMsc();
        $model->node_id = array_search($model->node_id, $listMsc);
    }
}
