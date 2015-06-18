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

/**
 * MscController implements the CRUD actions for Msc model.
 */
class MscController extends Controller
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
     * Lists all Msc models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MscSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
            if ($model->dummy_number == '')
                $model->dummy_number = NULL;
            $model->save();
            return $this->redirect(['view', 'id' => $model->msc_name]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'listData' => $listData,
                'option' => $option,
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
            if ($model->dummy_number == '')
                $model->dummy_number = NULL;
            $model->save();
            return $this->redirect(['view', 'id' => $model->msc_name]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'listData' => $listData,
                'option' => $option,
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
}
