<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrderReceiveItem */

$this->title = 'Update Purchase Order Receive Item: ' . $model->purchase_order_receive_item_id;
$this->params['breadcrumbs'][] = ['label' => 'Purchase Order Receive Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->purchase_order_receive_item_id, 'url' => ['view', 'id' => $model->purchase_order_receive_item_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="purchase-order-receive-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
