<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentVoucher */

$this->title = 'Update Payment Voucher: ' . ' ' . $model->payment_voucher_id;
$this->params['breadcrumbs'][] = ['label' => 'Payment Vouchers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->payment_voucher_id, 'url' => ['view', 'id' => $model->payment_voucher_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payment-voucher-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
