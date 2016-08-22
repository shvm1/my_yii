<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Diet */
/* @var $dietprices app\models\DietPrice[] */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diet-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-sm-6">
        <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Характеристики диеты</h3>
        </div>
        <div class="panel-body">
    
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'kal')->textInput() ?>

            </div>
    
        </div>
    </div> 


    <div class="col-sm-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Цены 1 дня диеты</h3>
            </div>
            <div class="panel-body">
                <?php  foreach($dietprices as $dietprice):?>
                         <?= $form->field($dietprice, '[' . $dietprice->kit_id . ']price')->label($dietprice->kit->title); ?>
                    <?php endforeach;?>

            </div>
        </div>
    </div>
    <div class="col-sm-2 col-sm-offset-5">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>