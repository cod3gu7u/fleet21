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


<p>
    <?= Html::a('<i class="glyphicon glyphicon-print"></i> Report', ['report', 'id' => $model->cashbook_entry_id], ['class' => 'btn btn-info', 'target'=> '_blank',]) ?> 
    <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Update', ['update', 'id' => $model->cashbook_entry_id], ['class' => 'btn btn-primary']) ?>
</p>

<div class="cashbook-view">

    <?= DetailView::widget([
        'model'=>$model,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'panel'=>[
            'heading'=>'Cashbook Entry # ' . $model->cashbook_entry_id,
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
            'notes:ntext',
            'exclusive_amount',
            [
                'attribute' => 'tax_id',
                'value'=>$model->tax->tax,
            ],             
            'tax_amount',
            'total_amount',
        ]
    ]);?>

</div>
