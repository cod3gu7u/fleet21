<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StockIssuance */

?>
<div class="stock-issuance-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'stock_issuance_id',
            'purchaseOrderItem.purchase_order_item',
            'units',
            'issuance_date',
            'notes:ntext',
            'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',
        ],
    ]) ?>

</div>
