<?php

namespace app\controllers;

use Yii;
use app\models\News;
use app\models\NewsSearch;
use yii\base\DynamicModel;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['create', 'update', 'index', 'view', 'delete', 'slider', 'deleteslider'],
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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $this->saveModel($model);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $this->saveModel($model);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->deleteImage($id);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function deleteImage($id)
    {
        $image = $this->findModel($id)->image_id;
        if ($image !== NULL && $image !== '')
            Yii::$app->db->createCommand('DELETE FROM uploaded_file WHERE id = '.$image)->execute();
    }

    public function actionSlider()
    {
        $model = new DynamicModel([
            'file_id'
        ]);
     
        // behavior untuk upload file
        $model->attachBehavior('upload', [
            'class' => 'mdm\upload\UploadBehavior',
            'attribute' => 'file',
            'savedAttribute' => 'file_id', 
            //'uploadPath' => Yii::$app->homeUrl.'/files',
        ]);   
     
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->saveUploadedFile() !== false) {
                if ($model->file_id !== NULL && $model->file_id !== '')
                    Yii::$app->db->createCommand('UPDATE uploaded_file SET type = "slider" WHERE id = '.$model->file_id)->execute();
                Yii::$app->session->setFlash('success', 'Upload Success');
            }
        }
        return $this->render('slider',['model' => $model]);
    }

    public function actionDeleteslider($id)
    {
        Yii::$app->db->createCommand('DELETE FROM uploaded_file WHERE id = '.$id)->execute();
        return $this->redirect(['slider']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function saveModel($model)
    {
        $model->username = User::findIdentity(Yii::$app->user->id)->username;
        if($model->saveUploadedFile() !== false)
        {               
            $model->save();
            Yii::$app->db->createCommand('UPDATE uploaded_file SET type = "news" WHERE id = '.$model->image_id)->execute();
        }
    }
}
