<?php

namespace app\controllers;

use Yii;
use app\models\DietdayMealDish;
use app\models\search\DietdayMealDishSearh;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DietdayMealDishController implements the CRUD actions for DietdayMealDish model.
 */
class DietdayMealDishController extends Controller
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
     * Lists all DietdayMealDish models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DietdayMealDishSearh();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DietdayMealDish model.
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
     * Creates a new DietdayMealDish model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($DietdayId, $MealId)
    {
        $dietday = findDietday($DietdayId);
        $model = new DietdayMealDish();
        $model->dietday_id = $DietdayId;
        $model->meal_id = $MealId;
        $model->save(false);
        $this->batchUpdate($dietday->dietdayMealDishes);
        $dietday->refresh();
        return $this->renderAjax('_form', ['model' => $dietday]);
        
    }

    /**
     * Updates an existing DietdayMealDish model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($DietdayId)
    {
        $dietday = findDietday($DietdayId);
        
        $this->batchUpdate($dietday->dietdayMealDishes);
        $dietday->refresh();
        
        return $this->renderAjax('_form', ['model' => $dietday]);
    }

    /**
     * Deletes an existing DietdayMealDish model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $dietday = $model->dietday;
        $model->delete();
        $this->batchUpdate($dietday->dietdayMealDishes);
        $dietday->refresh();
        
        return $this->renderAjax('_form', ['model' => $dietday]);
    }

    /**
     * Finds the DietdayMealDish model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DietdayMealDish the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DietdayMealDish::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Finds the Dietday model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dietday the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findDietday($id)
    {
        if (($model = Dietday::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Update all MealDishes
     * @param Model $items
     * @return nothing
     */
    protected function batchUpdate($items, $deleteEmpty = false)
    {
        if (Model::loadMultiple($items, Yii::$app->request->post()) &&
            Model::validateMultiple($items)) {
            foreach ($items as $key => $item) {
                if(!$item->dish_id || !$item->value)
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
