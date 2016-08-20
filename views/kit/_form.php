<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Meal;

/* @var $this yii\web\View */
/* @var $model app\models\Kit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mealsArray')->checkboxList(Meal::find()->active()->select(['title','id'])->indexBy('id')->column())->label('Приемы пищи') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
