<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ddiet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ddiet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dd_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dd_kal')->textInput() ?>

    <?= $form->field($model, 'dd_status_del')->textInput() ?>

    <?= $form->field($model, 'u_create')->textInput() ?>

    <?= $form->field($model, 'u_update')->textInput() ?>

    <?= $form->field($model, 'v_update')->textInput() ?>

    <?= $form->field($model, 'v_create')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
