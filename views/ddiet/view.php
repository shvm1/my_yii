<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ddiet */

$this->title = $model->dd_id;
$this->params['breadcrumbs'][] = ['label' => 'Ddiets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ddiet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->dd_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->dd_id], [
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
            'dd_id',
            'dd_title',
            'dd_kal',
            'dd_status_del',
            'u_create',
            'u_update',
            'v_update',
            'v_create',
        ],
    ]) ?>

</div>
