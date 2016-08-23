<?php

use yii\helpers\Html;
use app\models\Meal;

?>
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo ($index+1).'-й день (Калорийность - '.$model->kal.' ккал.; Б \ Ж \ У - '.round($model->protein, 2).' \ '.round($model->fat,2).' \ '.round($model->carbohydrate,2).')'; ?></h3>
    </div>
    <div class="panel-body">
        <?php $dietdayMealDishes = array(); 
        foreach($model->getDietdayMealDishes()->with(['dish'])->all() as $DietMealDish)
        {
            $dietdayMealDishes[$DietMealDish->meal_id][] = $DietMealDish->dish->title.' - '.$DietMealDish->value.'г.';
        }
        ?>
        
        <?php foreach(Meal::find()->active()->orderBy(['sort' => SORT_ASC])->all() as $meal): ?>
        <?php if(isset($dietdayMealDishes[$meal->id])):?>
        <div class="row">
            <div class="col-sm-12"><b><?= $meal->title; ?></b></div>
            <div class="col-sm-12">
                <?= implode(';<br>',$dietdayMealDishes[$meal->id]); ?>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

