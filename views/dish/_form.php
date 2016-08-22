<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $model app\models\Dish */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dish-form col-sm-7">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Характеристики блюда</h3>
        </div>
        <div class="panel-body">
    
  
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kal')->textInput() ?>

    <?= $form->field($model, 'protein')->textInput() ?>

    <?= $form->field($model, 'fat')->textInput() ?>

    <?= $form->field($model, 'carbohydrate')->textInput() ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

    <?php ActiveForm::end(); ?>
        </div>
    </div>    
</div>

<div class="dish-vitamins-form  col-sm-5">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Витамины блюда</h3>
        </div>
        <div class="panel-body">
            
<?php 
if($model->isNewRecord)
    {
    echo 'Добавить витамины Вы сможете после создания блюда.';
    }
else
    {
    Pjax::begin(['enablePushState' => false]);     
        echo $this->render('_vitamins', ['model' => $model]);
     Pjax::end(); 
    }
 ?>    
        </div>
    </div>
</div>
