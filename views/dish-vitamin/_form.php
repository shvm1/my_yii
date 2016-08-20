<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DishVitamin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dish-vitamin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dish_id')->textInput() ?>

    <?= $form->field($model, 'vitamin_id')->textInput() ?>

    <?= $form->field($model, 'value')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
