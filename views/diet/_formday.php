<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $model app\models\Diet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dietday-form col-sm-7">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">День</h3>
        </div>
        <div class="panel-body">
    
  <?php
    Pjax::begin(['enablePushState' => false]);     
        echo $this->render('/dietday-meal-dish/_form', ['model' => $dietday]);
     Pjax::end(); 
?>
        </div>
    </div>    
</div>

<div class="dietdays-show  col-sm-5">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Дни диеты</h3>
        </div>
        <div class="panel-body">
            

        </div>
    </div>
</div>
