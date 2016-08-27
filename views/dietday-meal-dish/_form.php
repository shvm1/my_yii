<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Dish;
use app\models\Meal;

/* @var $this yii\web\View */
/* @var $model app\models\Dietday */
/* @var $form yii\widgets\ActiveForm */

 $form = ActiveForm::begin([
    'action' => Url::toRoute(['dietday-meal-dish/update', 'DietdayId' => $model->id]),
    'options' => [
        'data-pjax' => '1'
    ],
    'id' => 'DietdayMealDishUpdateForm'
]); 
 
 $dishesArray = Dish::find()->active()->select(['title','id'])->indexBy('id')->column();
 $mealsArray = Meal::find()->active()->select(['title','id'])->indexBy('id')->orderBy(['sort' => SORT_ASC])->column();

$dietdayMealDishes = array(); 
    foreach($model->dietdayMealDishes as $DietMealDish)
    {
        $dietdayMealDishes[$DietMealDish->meal_id][] = $DietMealDish;
    } 

echo '<table class="table table-bordered table-condensed">';
        foreach($mealsArray as $mealId => $mealTitle)
        {
            if(isset($dietdayMealDishes[$mealId]))
            {
            ?>
            
                <tr>
                     <td class="" style="width:150px;text-align: right;vertical-align: middle;"><b><?= $mealTitle; ?></b></td>
                     <td class="">
                        <?php foreach($dietdayMealDishes[$mealId] as $DietMealDish): ?>
                            
                        <div class="dish-one">
                            <?= $form->field($DietMealDish, "[$DietMealDish->id]dish_id",['options' => ['class' => 'pull-left', 'style' => 'width:300px;'],'labelOptions' => ['style' => 'display:none;']])->dropDownList($dishesArray,['prompt' => '']); ?>
                            <?= $form->field($DietMealDish, "[$DietMealDish->id]value",['options' => ['class' => 'pull-left', 'style' => 'width:80px;'],'labelOptions' => ['style' => 'display:none;']]); ?>

                            <?= Html::a('Х', null, [
                                'class' => 'btn btn-danger',
                                'data' => [
                                'toggle' => 'reroute',
                                'action' => Url::toRoute(['dietday-meal-dish/delete', 'id' => $DietMealDish->id])
                                ]
                            ]) ?>
                            <div style="clear:both;"></div>
                        </div>    
                            
                        <?php endforeach;?>
                    </td>
                </tr>
            
            <?php
            
            }
        }
        
        echo '</table>';
 ActiveForm::end(); 