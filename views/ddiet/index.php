<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DdietSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Диеты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ddiet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Новая диета', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'dd_id',
            'dd_title',
            'dd_kal',
            //'dd_status_del',
            //'u_create',
            // 'u_update',
            // 'v_update',
            // 'v_create',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
