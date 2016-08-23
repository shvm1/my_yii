<?php

namespace app\controllers;

use Yii;
use app\models\Diet;
use app\models\DietSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DdietController implements the CRUD actions for Ddiet model.
 */
class DietController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Ddiet models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DdietSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ddiet model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if($model->status_del) throw new NotFoundHttpException('The requested page does not exist.');//return $this->redirect(['index']);
        
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Ddiet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ddiet();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ddiet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // check active diet
        if($model->status_del) throw new NotFoundHttpException('The requested page does not exist.');//return $this->redirect(['index']);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ddiet model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->my_delete();
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the Ddiet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ddiet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        //if (($model = Ddiet::findOne($id)) !== null) {
        if (($model = Ddiet::find($id)->active()
                ->select(['{{%diet}}.*','count_day'=>new Expression('COUNT({{%dietday}}.id)')])
                ->joinWith(['dietdays' => function($q) {
                    $q->onCondition(['{{%dietday}}.status_del' => 0]);
                }],false)
                ->groupBy('{{%diet}}.id')->one()) !== null) {   
                    var_dump($model);exit;
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
