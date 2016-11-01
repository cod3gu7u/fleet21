<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CostCategory */

$this->title = 'Create Cost Category';
$this->params['breadcrumbs'][] = ['label' => 'Cost Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cost-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
