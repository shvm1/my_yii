<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ddiet */

$this->title = 'Update Ddiet: ' . $model->dd_id;
$this->params['breadcrumbs'][] = ['label' => 'Ddiets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dd_id, 'url' => ['view', 'id' => $model->dd_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ddiet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
