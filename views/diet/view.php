<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Diet */

$this->title = $model->d_title;
$this->params['breadcrumbs'][] = ['label' => 'Диеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->d_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->d_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить эту диету?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <? 
    $v_update_text = 'не изменялось';
    !$model->v_update || $v_update_text = Yii::$app->formatter->format($model->v_update, 'datetime');
    
    
    ?>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'd_id',
            'd_title',
            'd_kal',
            [                     
            'label' => 'Обновлено',
            'value' =>  $v_update_text,
        ],
            'v_create:datetime',
        ],
    ]) ?>

</div>
