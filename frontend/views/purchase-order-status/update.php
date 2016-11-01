<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrderStatus */

$this->title = 'Update Purchase Order Status: ' . ' ' . $model->purchase_order_status_id;
$this->params['breadcrumbs'][] = ['label' => 'Purchase Order Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->purchase_order_status_id, 'url' => ['view', 'id' => $model->purchase_order_status_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="purchase-order-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
