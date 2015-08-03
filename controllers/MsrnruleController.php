<?php

namespace app\controllers;

use Yii;
use app\models\MsrnRule;
use app\models\MsrnRuleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * MsrnruleController implements the CRUD actions for MsrnRule model.
 */
class MsrnruleController extends Controller
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
     * Lists all MsrnRule models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MsrnRuleSearch();
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
     * Displays a single MsrnRule model.
     * @param string $cmn
     * @param string $new_msrn
     * @return mixed
     */
    public function actionView($cmn, $new_msrn)
    {
        return $this->render('view', [
            'model' => $this->findModel($cmn, $new_msrn),
        ]);
    }

    /**
     * Creates a new MsrnRule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MsrnRule();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cmn' => $model->cmn, 'new_msrn' => $model->new_msrn]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MsrnRule model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $cmn
     * @param string $new_msrn
     * @return mixed
     */
    public function actionUpdate($cmn, $new_msrn)
    {
        $model = $this->findModel($cmn, $new_msrn);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cmn' => $model->cmn, 'new_msrn' => $model->new_msrn]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MsrnRule model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $cmn
     * @param string $new_msrn
     * @return mixed
     */
    public function actionDelete($cmn, $new_msrn)
    {
        $this->findModel($cmn, $new_msrn)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MsrnRule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $cmn
     * @param string $new_msrn
     * @return MsrnRule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($cmn, $new_msrn)
    {
        if (($model = MsrnRule::findOne(['cmn' => $cmn, 'new_msrn' => $new_msrn])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
