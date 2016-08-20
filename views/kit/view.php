<?php

use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Kit */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Наборы приемов пищи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'label' => 'Приемы пищи',
                'value' => implode(', ', ArrayHelper::map($model->meals, 'id', 'title')),
            ]
        ],
    ]) ?>

    
   
    
</div>
