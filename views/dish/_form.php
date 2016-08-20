<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use app\models\Vitamin;

/* @var $this yii\web\View */
/* @var $model app\models\Dish */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dish-form">

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
    <?php echo '<div>Витамины:</div>'; ?>
    <?php $form2 = ActiveForm::begin([
    'action' => Url::toRoute(['dish-vitamin/update', 'dishId' => $model->id]),
    'options' => [
        'data-pjax' => '1'
    ],
    'id' => 'vitaminsUpdateForm'
]); ?>

    <?php 
    $vitaminsArray = array();
    $vitamins = Vitamin::find()->active()->all();
    //var_dump($vitamins);
    foreach($vitamins as $vitamin)
    {
    $vitaminsArray[$vitamin->id] =  $vitamin->title.' '.$vitamin->unit->title; 
    }
    
    
    ?>
    <?php foreach ($model->dishVitamins as $key => $dishVitamin): ?>
    
    <?php //var_dump($dishVitamin->vitamin->title); ?>
    
            <?= $form2->field($dishVitamin, "[$key]vitamin_id",['options' => ['class' => 'pull-left'],'labelOptions' => ['style' => 'display:none;']])->dropDownList($vitaminsArray/*Vitamin::find()->active()->select(['name','id'])->indexBy('id')->column()*/); ?>
            <?= $form2->field($dishVitamin, "[$key]value",['options' => ['class' => 'pull-left'],'labelOptions' => ['style' => 'display:none;']]); ?>
            <?= Html::button('Х', ['class' => 'btn btn-danger del-dish-vitamin','rel' => $dishVitamin->id])?>
    <div style="clear:both;"></div>
    <?php endforeach ?>

    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
    
    
    
</div>
