<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ddiet */

$this->title = 'Изменение диеты: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Диеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="ddiet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
