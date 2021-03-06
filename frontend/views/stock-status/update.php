<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StockStatus */

$this->title = 'Update Stock Status: ' . ' ' . $model->stock_status_id;
$this->params['breadcrumbs'][] = ['label' => 'Stock Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stock_status_id, 'url' => ['view', 'id' => $model->stock_status_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stock-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
