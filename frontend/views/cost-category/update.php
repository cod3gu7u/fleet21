<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CostCategory */

$this->title = 'Update Cost Category: ' . ' ' . $model->cost_category_id;
$this->params['breadcrumbs'][] = ['label' => 'Cost Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cost_category_id, 'url' => ['view', 'id' => $model->cost_category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cost-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
