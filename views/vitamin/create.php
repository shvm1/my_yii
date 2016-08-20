<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Vitamin */

$this->title = 'Create Vitamin';
$this->params['breadcrumbs'][] = ['label' => 'Vitamins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vitamin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>