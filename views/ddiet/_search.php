<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DdietSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ddiet-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'kal') ?>

    <?= $form->field($model, 'status_del') ?>

    <?= $form->field($model, 'u_create') ?>

    <?php // echo $form->field($model, 'u_update') ?>

    <?php // echo $form->field($model, 'v_update') ?>

    <?php // echo $form->field($model, 'v_create') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
