<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Diet */

$this->title = 'Создать диету';
$this->params['breadcrumbs'][] = ['label' => 'Диеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
