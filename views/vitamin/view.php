<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Vitamin */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Vitamins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vitamin-view">

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
            [
                'attribute' => 'unit_id',
                'value' => ArrayHelper::getValue($model, 'unit.title'),
            ],
        ],
    ]) ?>

</div>
