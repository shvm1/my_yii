<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Unit;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\VitaminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vitamins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vitamin-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Vitamin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            'id',
            
            'title',
            [
                'attribute' => 'unit_id',
                
                'value' => 'unit.title',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
