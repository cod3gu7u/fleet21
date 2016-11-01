<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StockIssuanceDetail */

$this->title = 'Update Stock Issuance Detail: ' . ' ' . $model->stock_issuance_detail_id;
$this->params['breadcrumbs'][] = ['label' => 'Stock Issuance Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stock_issuance_detail_id, 'url' => ['view', 'id' => $model->stock_issuance_detail_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stock-issuance-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
