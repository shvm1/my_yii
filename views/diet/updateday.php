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
/* @var $dietday app\models\Dietday */

$this->title = $model->title.' изменение дня';
$this->params['breadcrumbs'][] = ['label' => 'Диеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view','id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение дня';
?>

<div class="diet-updateday">
    
    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= $this->render('_formday', [
        'model' => $model,
        'dietday' => $dietday,
    ]) ?>
    
</div>