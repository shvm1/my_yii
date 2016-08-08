<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ddiet */

$this->title = 'Create Ddiet';
$this->params['breadcrumbs'][] = ['label' => 'Ddiets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ddiet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
