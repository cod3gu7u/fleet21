<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PurchaseOrderReceiveItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Purchase Order Receive Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-order-receive-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Purchase Order Receive Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'purchase_order_receive_item_id',
            [
                'attribute' => 'purchase_order_line_item_id',
                'value'=>'purchaseOrderLineItem.purchaseOrderItem.purchase_order_item'
            ],
            'received_units',
            'received_date',
            'record_status',
            // 'notes:ntext',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
