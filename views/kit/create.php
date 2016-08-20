<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kit */

$this->title = 'Новый набор';
$this->params['breadcrumbs'][] = ['label' => 'Наборы приемов пищи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
