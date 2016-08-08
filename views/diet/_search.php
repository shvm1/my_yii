<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DietSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diet-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'd_id') ?>

    <?= $form->field($model, 'd_title') ?>

    <?= $form->field($model, 'd_kal') ?>

    <?= $form->field($model, 'v_update') ?>

    <?= $form->field($model, 'v_create') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
