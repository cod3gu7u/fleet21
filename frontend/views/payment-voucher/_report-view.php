<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentVoucher */

$this->title = $model->payment_voucher_id;
// $this->params['breadcrumbs'][] = ['label' => 'Payment Vouchers', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-voucher-view">

    <h4><?= "Payment Voucher"; ?></h4>

    <address>
        <strong><?= $model->creditor->creditor; ?></strong><br>
        <?= $model->creditor->address; ?><br>
        <?= $model->creditor->telephone; ?><br>
        <?= $model->creditor->email; ?><br>
    </address>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'payment_voucher_id',
            'bank.bank',
            'pv_number',
            'creditor.creditor',
            'pv_date',
            'paymentMethod.payment_method',
            [
                'attribute'=>'amount',
                'format'=>['currency', 'P  '],
            ],
            [
                'attribute'=>'discount',
                'format'=>['currency', 'P  '],
            ],
            'tax_rate',
            [
                'attribute'=>'final_amount',
                'format'=>['currency', 'P  '],
            ],
            'cheque_no',
            'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',
        ],
    ]) ?>

</div>

<table class="table bordered">
  <tbody>
  <tr>
    <td>Prepared by:</td>
    <td></td> 
  </tr>
  <tr>
    <td>Authorised by:</td>
    <td></td> 
  </tr>
  </tbody>
</table>

<br/>

<table class="table bordered">
  <thead>
  <tr>
      <th colspan="2">
          I hereby confirm that I have received the above amount in full:
      </th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td>Fullname:</td>
    <td></td> 
  </tr>
  <tr>
    <td>Signature:</td>
    <td></td> 
  </tr>
  </tbody>
</table>
