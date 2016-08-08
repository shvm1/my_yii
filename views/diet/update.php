<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Diet */

$this->title = 'Изменение диеты: ' . $model->d_title;
$this->params['breadcrumbs'][] = ['label' => 'Диеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->d_title, 'url' => ['view', 'id' => $model->d_id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="diet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
