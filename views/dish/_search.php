<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\DishSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dish-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'kal') ?>

    <?= $form->field($model, 'protein') ?>

    <?= $form->field($model, 'fat') ?>

    <?php // echo $form->field($model, 'carbohydrate') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'status_del') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
