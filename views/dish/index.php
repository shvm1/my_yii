<?php

use app\models\Dish;
use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\search\DishSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dishes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dish-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            
            'title',
            'kal',
            [
                'label' => 'Белки/Жиры/Угл.',
                'value' => function(Dish $dish){
                    return $dish->protein.' / '.$dish->fat.' / '.$dish->carbohydrate;
                },
            ],
           
            //'protein',
            //'fat',
            // 'carbohydrate',
            // 'url:url',
            // 'image',
             'weight',
            // 'description',
             'price',
            // 'status_del',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
