<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DietdayMealDish */

$this->title = 'Create Dietday Meal Dish';
$this->params['breadcrumbs'][] = ['label' => 'Dietday Meal Dishes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dietday-meal-dish-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
