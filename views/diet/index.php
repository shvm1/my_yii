<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\DietSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Diets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Diet', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'kal',
            'status_del',
            'create_time:datetime',
            // 'update_time:datetime',
            // 'create_user_id',
            // 'update_user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
