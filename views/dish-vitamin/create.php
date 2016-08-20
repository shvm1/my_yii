<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DishVitamin */

$this->title = 'Create Dish Vitamin';
$this->params['breadcrumbs'][] = ['label' => 'Dish Vitamins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dish-vitamin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
