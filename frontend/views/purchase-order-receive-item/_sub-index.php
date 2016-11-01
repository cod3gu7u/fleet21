<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PurchaseOrderReceiveItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="purchase-order-receive-item-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'purchase_order_receive_item_id',
            // [
            //     'attribute' => 'purchase_order_line_item_id',
            //     'value'=>'purchaseOrderLineItem.purchaseOrderItem.purchase_order_item'
            // ],
            'received_units',
            'received_date',
            // 'record_status',
            // 'notes:ntext',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
