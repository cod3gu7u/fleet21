<?php
use yii\helpers\Html;

/*
@'bank_balance' => $bank_balance,
@'sales_trnx_model' => $sales_trnx_model,
@'payment_voucher_model' => $payment_voucher_model,
@'bank_transfer_model' => $bank_transfer_model,
@var $return_trnx_model,
*/

// print_r($sales_trnx_model);
// die();
?>
	
    
	<table class="table table-striped table-bordered">
	<caption><h4><?= $bank ?></h4></caption>
      <thead>
        <tr class="info">
          <th width="30%">Description</th>
          <th width="20%" class="text-right"><?= $bank_currency ?></th>
          <th width="30%">Description</th>
          <th width="20%" class="text-right"><?= $bank_currency ?></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Opening Balance</th>
          <td class="text-right"><?= $opening_balance >= 0.00 ? \Yii::$app->formatter->asCurrency($opening_balance) : \Yii::$app->formatter->asCurrency(0.00)  ?></td>
          <td>Opening Balance</td>
          <td class="text-right"><?= $opening_balance < 0.00 ? \Yii::$app->formatter->asCurrency($opening_balance) : \Yii::$app->formatter->asCurrency(0.00) ?></td>
        </tr>
        <tr>
          <th scope="row">Receipts</th>
          <td class="text-right"><?= \Yii::$app->formatter->asCurrency($sales_trnx_model) ?></td>
          <th>Payments</th>
          <td class="text-right"><?= \Yii::$app->formatter->asCurrency($payment_voucher_model) ?></td>
        </tr>
        <tr>
          <th scope="row">Deposit</th>
          <td class="text-right"><?= \Yii::$app->formatter->asCurrency($bank_in_transfer_model) ?></td>
          <th>Withdrawal</th>
          <td class="text-right"><?= \Yii::$app->formatter->asCurrency($bank_out_transfer_model) ?></td>
        </tr>
        <tr>
          <th scope="row"></th>
          <th></th>
          <th>Return</th>
          <th class="text-right"><?= \Yii::$app->formatter->asCurrency($return_trnx_model)  ?></th>
        </tr>
        <tr class="active">
          <th scope="row">Total Debits</th>
          <th class="text-right"><?= \Yii::$app->formatter->asCurrency($total_debits) ?></th>
          <th>Total Credits</th>
          <th class="text-right"><?= \Yii::$app->formatter->asCurrency($total_credits)  ?></th>
        </tr>
      </tbody>
    </table>
