<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\KitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Наборы приемов пищи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kit-index">

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
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
