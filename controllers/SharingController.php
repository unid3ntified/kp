<?php

namespace app\controllers;

use Yii;
use app\models\Sharing;
use yii\base\DynamicModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * BcuidController implements the CRUD actions for BcuId model.
 */
class SharingController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'delete', 'download', 'rename', 'topology', 'deletetopology', 'dltopology'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index', 'download', 'topology', 'dltopology'],
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

    public function actionIndex()
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
        
        $model->addRule('file_id', 'safe')
            ->addRule('file', 'file', ['maxSize' => 26214400]);

        $data = Yii::$app->db->createCommand('SELECT * FROM uploaded_file WHERE type = "sharing"')->queryAll();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->saveUploadedFile() !== false) {
                if ($model->file_id !== NULL && $model->file_id !== '')
                    Yii::$app->db->createCommand('UPDATE uploaded_file SET type = "sharing" WHERE id = '.$model->file_id)->execute();
                Yii::$app->session->setFlash('success', 'Upload Success');
            }
        }
        return $this->render('index',[
            'model' => $model,
            'data' => $data,
            ]);
    }

    public function actionDownload($path)
    {
        if(file_exists($path)) {
            Yii::$app->response->sendFile($path); 
        }
    }

    public function actionDelete($id)
    {
        Yii::$app->db->createCommand('DELETE FROM uploaded_file WHERE id = '.$id)->execute();
        return $this->redirect(['index']);
    }

    public function actionTopology()
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
        $data = Yii::$app->db->createCommand('SELECT * FROM uploaded_file WHERE type = "topology"')->queryAll();
        $support = array("jpeg", "jpg", "png", "bmp", "gif", "jpe", "jfif", "jif", "jfi");   
     
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->saveUploadedFile() !== false) {
                if ($model->file_id !== NULL && $model->file_id !== '')
                    Yii::$app->db->createCommand('UPDATE uploaded_file SET type = "topology" WHERE id = '.$model->file_id)->execute();
                Yii::$app->session->setFlash('success', 'Upload Success');
            }
        }
        return $this->render('topology',[
            'model' => $model,
            'data' => $data,
            'support' => $support,
        ]);
    }

    public function actionDeletetopology($id)
    {
        Yii::$app->db->createCommand('DELETE FROM uploaded_file WHERE id = '.$id)->execute();
        return $this->redirect(['topology']);
    }


}