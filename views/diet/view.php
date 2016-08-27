<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\Collapse;

use app\models\Dietday;
use app\models\Meal;

/* @var $this yii\web\View */
/* @var $model app\models\Diet */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Diets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'kal'
            //'status_del',
            //'create_time:datetime',
            //'update_time:datetime',
            //'create_user_id',
            //'update_user_id',
        ],
    ]) ?>
 
 <h2>Дни диеты</h2>   
 <?php
 
 $meals = Meal::find()->active()->orderBy(['sort' => SORT_ASC])->all();
 $items = array();
 
 foreach(Dietday::find()->forDietView()->andWhere(['diet_id'=> $model->id])->all() as $k => $dietday)
 {
        if(!$k) $items[$k]['contentOptions'] = ['class' => 'in'];
        $items[$k]['options'] = array('class' => 'panel-success');
        $items[$k]['label'] = '<b>'.($k+1).'-й день (Калорийность - '.$dietday->kal.' ккал.; Б \ Ж \ У - '.round($dietday->protein, 2).' \ '.round($dietday->fat,2).' \ '.round($dietday->carbohydrate,2).')</b>';
       
        $dietdayMealDishes = array(); 
        foreach($dietday->getDietdayMealDishes()->with(['dish'])->all() as $DietMealDish)
        {
            $dietdayMealDishes[$DietMealDish->meal_id][] = $DietMealDish->dish->title.' - '.$DietMealDish->value.'г.';
        } 
        ob_start();
        echo '<table class="table table-bordered table-condensed">';
        foreach($meals as $meal)
        {
            if(isset($dietdayMealDishes[$meal->id]))
            {
            ?>
            
                <tr>
                     <td class="" style="width:150px;text-align: right;vertical-align: middle;"><b><?= $meal->title; ?></b></td>
                     <td class="">
                        <?= implode(';<br>',$dietdayMealDishes[$meal->id]); ?>
                    </td>
                </tr>
            
            <?php
            
            }
        }
        
        echo '</table>';
        ?>
                
        <?= Html::a('Update', ['updatedays', 'id' => $model->id, 'DayId' => $dietday->id], ['class' => 'btn btn-primary']);?>
        <?= Html::a('Delete', ['dietday/delete', 'id' => $dietday->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить этот день?',
                'method' => 'post',
            ],
        ]); 
        
        $items[$k]['content'] = ob_get_clean();
 }
 
 
 echo Collapse::widget(['items' => $items,
                        'encodeLabels' => false,
                        
     ]);
 /*echo ListView::widget([
    'dataProvider' => new ActiveDataProvider(['query' => $model->getDietdays()->forDietView(),
                                                'pagination' => false]),
    'itemView' => '_dietday',
     'summary' => '<h2>Дни диеты</h2>'
     
]);*/?>

</div>
