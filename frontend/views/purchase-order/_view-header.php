<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrder */

?>
<div class="purchase-order-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'purchase_order_id',
            'creditor.creditor',
            'order_date',
            'shipping_date',
            [
               'attribute'=>'total_amount',
               'format'=>'currency',
            ],
            [
               'attribute'=>'billed_amount',
               'format'=>'currency',
            ],
            'orderStatus.purchase_order_status',
            'notes:ntext',
            'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',
        ],
        'options' => ['class' => 'table table-striped table-bordered table-hover detail-view'],
    ]) ?>

</div>