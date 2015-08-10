<?php

namespace app\controllers;

use Yii;
use app\models\SgsnCapDimensioning;
use app\models\SgsnCapDimensioningSearch;
use app\models\NetworkElement;
use app\models\NetworkElementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SgsncapdimensioningController implements the CRUD actions for SgsnCapDimensioning model.
 */
class SgsncapdimensioningController extends Controller
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
     * Lists all SgsnCapDimensioning models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SgsnCapDimensioningSearch();
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
     * Displays a single SgsnCapDimensioning model.
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
     * Creates a new SgsnCapDimensioning model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SgsnCapDimensioning();
        $listSgsn = NetworkElement::listSgsn();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            $valid = $this->fillModel($model);
            if ($valid)
            {
                return $this->redirect(['view', 'id' => $model->node_name]);
            }
            else 
            {
                $this->convertDropDown($model);
                return $this->render('create', [
                    'model' => $model,
                    'listSgsn' => $listSgsn,
                ]);
            }
        } 
        else
        {
            return $this->render('create', [
                'model' => $model,
                'listSgsn' => $listSgsn,
            ]);
        }
    }

    /**
     * Updates an existing SgsnCapDimensioning model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $listSgsn = NetworkElement::listSgsn();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            $valid = $this->fillModel($model);
            if ($valid)
            {
                return $this->redirect(['view', 'id' => $model->node_name]);
            }
            else 
            {
                $this->convertDropDown($model);
                return $this->render('update', [
                    'model' => $model,
                    'listSgsn' => $listSgsn,
                ]);
            }
        } 
        else
        {
            return $this->render('update', [
                'model' => $model,
                'listSgsn' => $listSgsn,
            ]);
        }
    }

    /**
     * Deletes an existing SgsnCapDimensioning model.
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
     * Finds the SgsnCapDimensioning model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SgsnCapDimensioning the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SgsnCapDimensioning::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function fillModel($model)
    {
        $listSgsn = NetworkElement::listSgsn();
        $model->node_name = $listSgsn[$model->node_name];
        return $model->save();
    }

    public function convertDropDown($model)
    {
        $listSgsn = NetworkElement::listSgsn();
        $model->node_name = array_search($model->node_name, $listSgsn);
    }
}
