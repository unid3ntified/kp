<?php

namespace app\controllers;

use Yii;
use app\models\DescNetwork;
use app\models\DescNetworkSearch;
use app\models\Networkelement;
use app\models\NetworkElementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * DescnetworkController implements the CRUD actions for DescNetwork model.
 */
class DescnetworkController extends Controller
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
     * Lists all DescNetwork models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DescNetworkSearch();
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
     * Displays a single DescNetwork model.
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
     * Creates a new DescNetwork model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DescNetwork();
        $listData = ArrayHelper::map(NetworkELement::find()->asArray()->all(), 'network_element_id', 'network_element_id');
       
        if ($model->load(Yii::$app->request->post())) 
        {
            $valid = $this->fillModel($model);
                        
            if ($valid == 0)
            {
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else
            {
                if ($valid == 1)
                    $err = 'There are 2 or more OPC that has same value.';
                else
                    $err = 'OPC has been taken.';
                return $this->render('create', [
                    'model' => $model,
                    'listData' => $listData,
                    'err' => $err,
                ]);
            }
        } 
        else {
            return $this->render('create', [
                'model' => $model,
                'listData' => $listData,
                'err' => '',
            ]);
        }
    }

    /**
     * Updates an existing DescNetwork model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $listData = ArrayHelper::map(NetworkELement::find()->asArray()->all(), 'network_element_id', 'network_element_id');
        $model2 = NetworkElement::findOne($model->network_element_id);

        if ($model->load(Yii::$app->request->post())) {
            $temp = new DescNetwork();
            $temp->id = $model->id;
            $temp->network_element_id = $model->network_element_id;
            $temp->desc_network = $model->desc_network;
            $temp->opc_nat0 = $model->opc_nat0;
            $temp->opc_nat1 = $model->opc_nat1;
            $temp->inat0 = $model->inat0;
            $temp->second_opc = $model->second_opc;
            $temp->third_opc = $model->third_opc;
            $temp->fourth_opc = $model->fourth_opc;
            $temp->fifth_opc = $model->fifth_opc;
            $temp->sixth_opc = $model->sixth_opc;
            $temp->remark = $model->remark;
            $model->delete();

            $valid = $this->fillModel($temp);

            if ($valid == 0)
            {
                $model2->log_date = date('Y-m-d');
                $model2->save();
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else
            {
                if ($valid == 1)
                    $err = 'There are 2 or more OPC that has same value.';
                else
                    $err = 'OPC has been taken.';
                return $this->render('update', [
                    'model' => $model,
                    'listData' => $listData,
                    'err' => $err,
                ]);
            }

        } else {
            return $this->render('update', [
                'model' => $model,
                'listData' => $listData,
                'err' => '',
            ]);
        }
    }

    /**
     * Deletes an existing DescNetwork model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DescNetwork model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DescNetwork the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DescNetwork::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function loadOpc()
    {
        $opc_nat0 = array_filter(ArrayHelper::getColumn(DescNetwork::find()->asArray()->all(), 'opc_nat0'));        
        $opc_nat1 = array_filter(ArrayHelper::getColumn(DescNetwork::find()->asArray()->all(), 'opc_nat1'));
        $inat0 = array_filter(ArrayHelper::getColumn(DescNetwork::find()->asArray()->all(), 'inat0'));
        $second_opc = array_filter(ArrayHelper::getColumn(DescNetwork::find()->asArray()->all(), 'second_opc'));
        $third_opc = array_filter(ArrayHelper::getColumn(DescNetwork::find()->asArray()->all(), 'third_opc'));
        $fourth_opc = array_filter(ArrayHelper::getColumn(DescNetwork::find()->asArray()->all(), 'fourth_opc'));
        $fifth_opc = array_filter(ArrayHelper::getColumn(DescNetwork::find()->asArray()->all(), 'fifth_opc'));
        $sixth_opc = array_filter(ArrayHelper::getColumn(DescNetwork::find()->asArray()->all(), 'sixth_opc'));

        $array = array_merge($opc_nat0, $opc_nat1, $inat0, $second_opc, $third_opc, $fourth_opc, $fifth_opc, $sixth_opc);
        return $array;
    }

    public function fillModel($model)
    {
        if ($model->opc_nat0 == '')
            $model->opc_nat0 = NULL;
        if ($model->opc_nat1 == '')
            $model->opc_nat1 = NULL;
        if ($model->inat0 == '')
            $model->inat0 = NULL;
        if ($model->second_opc == '')
            $model->second_opc = NULL;
        if ($model->third_opc == '')
            $model->third_opc = NULL;
        if ($model->fourth_opc == '')
            $model->fourth_opc = NULL;
        if ($model->fifth_opc == '')
            $model->fifth_opc = NULL;
        if ($model->sixth_opc == '')
            $model->sixth_opc = NULL;

        $model->log_date = date('Y-m-d');
        
        return $this->compareOpc($model);
    }

    public function compareOpc($model)
    {
        $valid = 0;

        //compare input with each other
        $input = array_filter([$model->opc_nat0, $model->opc_nat1, $model->inat0, $model->second_opc, $model->third_opc, 
            $model->fourth_opc, $model->fifth_opc, $model->sixth_opc]);
        for($i = 0; $i < count($input) - 1; $i++)
            for($j = $i + 1; $j < count($input); $j++)
                if ($input[$i] !== NULL && $input[$j] !== NULL && $input[$i] == $input[$j])
                    $valid = 1;    

        //compare input with database
        $listOpc = $this->loadOpc();
        for($i = 0; $i < count($listOpc); $i++)
        {
            if ($model->opc_nat0 == $listOpc[$i])
            {
                $model->opc_nat0 = NULL;
                $valid = 2;
            }
            if ($model->opc_nat1 == $listOpc[$i])
            {
                $model->opc_nat1 = NULL;
                $valid = 2;
            }
            if ($model->inat0 == $listOpc[$i])
            {
                $model->inat0 = NULL;
                $valid = 2;
            }
            if ($model->second_opc == $listOpc[$i])
            {
                $model->second_opc = NULL;
                $valid = 2;
            }
            if ($model->third_opc == $listOpc[$i])
            {
                $model->third_opc = NULL;
                $valid = 2;
            }
            if ($model->fourth_opc == $listOpc[$i])
            {
                $model->fourth_opc = NULL;
                $valid = 2;
            }
            if ($model->fifth_opc == $listOpc[$i])
            {
                $model->fifth_opc = NULL;
                $valid = 2;
            }
            if ($model->sixth_opc == $listOpc[$i])
            {
                $model->sixth_opc = NULL;
                $valid = 2;
            }
        }
        return $valid;
    }
}
