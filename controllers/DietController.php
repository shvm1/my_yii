<?php

namespace app\controllers;

use Yii;
use app\models\Diet;
use app\models\search\DietSearch;
use app\models\DietPrice;
use app\models\Kit;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DietController implements the CRUD actions for Diet model.
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
     * Lists all Diet models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DietSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Diet model.
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
     * Creates a new Diet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Diet();
        $dietprices = $this->initDietPrices($model);
        $post = Yii::$app->request->post();
        
        if ($model->load($post) && $model->save() && Model::loadMultiple($dietprices, $post)) {
            $this->processDietPrices($dietprices, $model);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'dietprices' => $dietprices,
            ]);
        }
    }

    /**
     * Updates an existing Diet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $dietprices = $this->initDietPrices($model);
        $post = Yii::$app->request->post();
        
        if ($model->load($post) && $model->save() && Model::loadMultiple($dietprices, $post)) {
            $this->processDietPrices($dietprices, $model);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'dietprices' => $dietprices,
            ]);
        }
    }

    /**
     * Deletes an existing Diet model.
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
     * Finds the Diet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Diet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Diet::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * @param Diet $model
     * @return DietPrice[]
     */
    protected function initDietPrices(Diet $model)
    {
        /** @var DietPrice[] $dietprices */
        $dietprices = $model->getDietPrices()->with('kit')->indexBy('kit_id')->all();
        $kits = Kit::find()->indexBy('id')->all();

        foreach (array_diff_key($kits, $dietprices) as $kit) {
            $dietprices[$kit->id] = new DietPrice(['kit_id' => $kit->id]);
        }

        
        return $dietprices; 
    }
    
     /**
     * @param DietPrice[] $dietprices
     * @param Diet $model
     */
    private function processDietPrices($dietprices, Diet $model)
    {
        foreach ($dietprices as $dietprice) {
            $dietprice->diet_id = $model->id;
           
            $dietprice->save(false);  
        }
    }
}
