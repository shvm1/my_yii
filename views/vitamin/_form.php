<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Unit;


/* @var $this yii\web\View */
/* @var $model app\models\Vitamin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vitamin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit_id')->dropDownList(Unit::find()->active()->select(['title','id'])->indexBy('id')->column()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
