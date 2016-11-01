<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrderItem */

$this->title = 'Update Purchase Order Item: ' . ' ' . $model->purchase_order_item_id;
$this->params['breadcrumbs'][] = ['label' => 'Purchase Order Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->purchase_order_item_id, 'url' => ['view', 'id' => $model->purchase_order_item_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="purchase-order-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
