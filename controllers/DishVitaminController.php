<?php

namespace app\controllers;

use Yii;
use yii\base\Model;
use app\models\DishVitamin;
use app\models\search\DishVitaminSearh;
use app\models\Dish;
use app\models\Vitamin;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DishVitaminController implements the CRUD actions for DishVitamin model.
 */
class DishVitaminController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className()
            ],
        ];
    }

    /**
     * Lists all DishVitamin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DishVitaminSearh();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DishVitamin model.
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
     * Creates a new DishVitamin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($dishId)
    {
        $dish = $this->findDish($dishId);
        $model = new DishVitamin();
        $model->dish_id = $dishId;
        $model->save(false);
        $this->batchUpdate($dish->dishVitamins);
         $dish->refresh();
        return $this->renderAjax('/dish/_vitamins', ['model' => $dish]);
        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
    }

    /**
     * Updates an existing DishVitamin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($dishId)
    {
         $dish = $this->findDish($dishId);
        $this->batchUpdate($dish->dishVitamins, true);
        $dish->refresh();
       // $dish = $this->findDish($dishId);
        return $this->renderAjax('/dish/_vitamins', ['model' => $dish]);
       /* $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }*/
    }

    /**
     * Deletes an existing DishVitamin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
       $model = $this->findModel($id);
        $dish = $model->dish;
        $model->delete();
        $this->batchUpdate($dish->dishVitamins);
         $dish->refresh();
        return $this->renderAjax('/dish/_vitamins', ['model' => $dish]);
        
        /*$this->findModel($id)->delete();

        return $this->redirect(['index']);*/
    }

     
    
    
    /**
     * Finds the DishVitamin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DishVitamin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DishVitamin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Finds the Dish model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dish the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findDish($id)
    {
        if (($model = Dish::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    /**
     * Update all addresses
     * @param Model $items
     * @return nothing
     */
    protected function batchUpdate($items, $deleteEmpty = false)
    {
        if (Model::loadMultiple($items, Yii::$app->request->post()) &&
            Model::validateMultiple($items)) {
            foreach ($items as $key => $item) {
                if(!$item->vitamin_id || !$item->value)
                {
                 $deleteEmpty ? $item->delete() : $item->save(false);   
                }
                else
                {
                 $item->save();   
                }
                
            }
        }
    }
}
