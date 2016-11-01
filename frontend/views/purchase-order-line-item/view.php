<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrderLineItem */

$this->title = $model->purchaseOrderItem->purchase_order_item;
// $this->params['breadcrumbs'][] = ['label' => 'Purchase Order Line Items', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-order-line-item-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'purchase_order_line_item_id',
            // 'purchase_order_id',
            'purchaseOrderItem.purchase_order_item',
            'unit_cost',
            'units',
            'received_units',
            'tax_rate',
            'tax_amount',
            'total_amount',
            'billed_amount',
            'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',
        ],
    ]) ?>

</div>
