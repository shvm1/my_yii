<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\MealSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Приемы пищи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Новый', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           

            'id',
            'title',
            'sort',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
