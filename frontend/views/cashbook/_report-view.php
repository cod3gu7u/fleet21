<?php

use yii\helpers\Html;
// use yii\widgets\DetailView;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cashbook */

$this->title = $model->cashbook_entry_id;
$this->params['breadcrumbs'][] = ['label' => 'Cashbooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<br/>

<div class="span12 center-block">
    <b>
    <?php
        if($model->transaction_type_id == 1){
            echo "PAYMENT";
        } else if($model->transaction_type_id == 2){
            echo "PAYMENT";
        } else {
            echo "TRANSFER";
        } 
    ?>
    </b>
    <br/> <?= "<b>Date: </b>" . date("Y-m-d"); ?>
</div>

<br/>

<div class="cashbook-view">

    <?= DetailView::widget([
        'model'=>$model,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'panel'=>[
            'heading'=>'Cashbook Document # :' . $model->cashbook_entry_id,
            'type'=>DetailView::TYPE_INFO,
        ],
        'attributes'=>[
            [
                'attribute' => 'bank_id',
                'value'=>$model->bank->bank,
            ],
            [
                'attribute' => 'accounting_period_id',
                'value'=>$model->accountingPeriod->accounting_period,
            ],
            ['attribute'=>'transaction_date', 'type'=>DetailView::INPUT_DATE],
            [
                'attribute' => 'transaction_type_id',
                'value'=>$model->transactionType->transaction_type,
            ],
            [
                'attribute' => 'account_id',
                'value'=>$model->account->account_name,
            ],    
            [
                'attribute' => 'payer_payee_id',
                'value'=> $model->transaction_type_id == 1 ? $model->creditor->creditor : $model->customer->customer_name,
            ],         
            'reference_number',
            [
                'attribute' => 'exclusive_amount',
                'value'=>$model->exclusive_amount,
                'format' => 'Currency',
            ],
            [
                'attribute' => 'tax_amount',
                'value'=>$model->tax_amount,
                'format' => 'Currency',
            ],   
            [
                'attribute' => 'total_amount',
                'value'=>$model->total_amount,
                'format' => 'Currency',
            ], 
            'notes:ntext',
        ]
    ]);?>

</div>

<br/>

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
