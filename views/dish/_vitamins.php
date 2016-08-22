<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

 $form = ActiveForm::begin([
    'action' => Url::toRoute(['dish-vitamin/update', 'dishId' => $model->id]),
    'options' => [
        'data-pjax' => '1'
    ],
    'id' => 'vitaminsUpdateForm'
]); ?>

    <?php 
   
     $vitaminsArray = $model->vitaminsarrayselect;
    ?>
    <?php foreach ($model->dishVitamins as $key => $dishVitamin): ?>
    
    <?php //var_dump($dishVitamin->vitamin->title); ?>
        <div class="vitamin-one">
            <?= $form->field($dishVitamin, "[$key]vitamin_id",['options' => ['class' => 'pull-left'],'labelOptions' => ['style' => 'display:none;']])->dropDownList($vitaminsArray,['prompt' => '']/*$vitaminsArray/*Vitamin::find()->active()->select(['name','id'])->indexBy('id')->column()*/); ?>
            <?= $form->field($dishVitamin, "[$key]value",['options' => ['class' => 'pull-left', 'style' => 'width:80px;'],'labelOptions' => ['style' => 'display:none;']]); ?>
            
            <?= Html::a('Х', null, [
                'class' => 'btn btn-danger',
                'data' => [
                'toggle' => 'reroute',
                'action' => Url::toRoute(['dish-vitamin/delete', 'id' => $dishVitamin->id])
                ]
            ]) ?>
            <div style="clear:both;"></div>
        </div>
        
       
    <?php endforeach ?>
         <div style="height:15px;"></div>
          <?= Html::a('Добавить витамин', null, [
        'class' => 'btn btn-success',
        'data' => [
            'toggle' => 'reroute',
            'action' => Url::toRoute(['dish-vitamin/create', 'dishId' => $model->id])
            ]
    ]); ?>
        
        <div style="height:25px;"></div>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>

