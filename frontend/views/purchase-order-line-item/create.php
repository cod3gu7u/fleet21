<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrderLineItem */

$this->title = 'Create Purchase Order Line Item';
$this->params['breadcrumbs'][] = ['label' => 'Purchase Order Line Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-order-line-item-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
