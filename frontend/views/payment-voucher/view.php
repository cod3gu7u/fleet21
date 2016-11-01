<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentVoucher */

$this->title = $model->payment_voucher_id;
$this->params['breadcrumbs'][] = ['label' => 'Payment Vouchers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-voucher-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-print"></i> Report', ['report', 'id' => $model->payment_voucher_id], ['class' => 'btn btn-info', 'target'=> '_blank',]) ?> 
        <?php if(\Yii::$app->user->can('admin')) : ?>
            <?= Html::a('Update', ['update', 'id' => $model->payment_voucher_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->payment_voucher_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <? endif ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'payment_voucher_id',
            'bank.bank',
            'pv_number',
            'creditor.creditor',
            'pv_date',
            'paymentMethod.payment_method',
            'amount',
            'discount',
            'tax_rate',
            'final_amount',
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
