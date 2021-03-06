<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\Diet */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Diets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'kal'
            //'status_del',
            //'create_time:datetime',
            //'update_time:datetime',
            //'create_user_id',
            //'update_user_id',
        ],
    ]) ?>
    
 <?php   echo ListView::widget([
    'dataProvider' => new ActiveDataProvider(['query' => $model->getDietdays()->forDietView(),
                                                'pagination' => false]),
    'itemView' => '_dietday',
     'summary' => '<h2>Дни диеты</h2>'
     
]);?>

</div>
