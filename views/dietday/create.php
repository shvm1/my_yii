<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dietday */

$this->title = 'Create Dietday';
$this->params['breadcrumbs'][] = ['label' => 'Dietdays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dietday-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
