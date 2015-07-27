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
                        'actions' => ['create', 'index', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
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
     
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->saveUploadedFile() !== false) {
                Yii::$app->session->setFlash('success', 'Upload Success');
            }
        }
        return $this->render('index',['model' => $model]);
    }

    public function actionCreate()
    {
         
    }
}