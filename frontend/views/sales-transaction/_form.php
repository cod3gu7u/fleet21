<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\SalesTransaction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-transaction-form">

<?php

$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]);
echo FormGrid::widget([
    'model'=>$model,
    'form'=>$form,
    'autoGenerateColumns'=>true,
    'rows'=>[
        [
            'attributes'=>[       // 2 column layout
                'sales_transaction_type_id'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                        'items'=>$model->salesTransactionTypeList, 
                        ],
                'transaction_date'=>['type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\DatePicker', 
                        'options' => ['pluginOptions' => [
                            'format' => 'yyyy-mm-dd', 
                            'autoclose'=>true, 
                            'todayHighlight' => true]],
                        ],
            ]
        ],
        [
            'attributes'=>[       // 4 column layout
                'payment_method_id'=>[
                    'type'=>Form::INPUT_DROPDOWN_LIST, 
                    'items'=>$model->paymentMethodList, 
                    ],
                'bank_id'=>[
                    'type'=>Form::INPUT_DROPDOWN_LIST, 
                    'items'=>$model->bankList, 
                    ],
                'currency_id'=>[
                    'type'=>Form::INPUT_DROPDOWN_LIST, 
                    'items'=>$model->currencyList, 
                    ],
            ]
        ],
        [
            'attributes'=>[       
                'total_amount'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>['placeholder'=>'Paid amount...']
                    ],
                'exchange_rate'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>['placeholder'=>'Exchange rate...']
                    ],
                'transaction_amount'=>[
                    'type'=>Form::INPUT_TEXT, 
                    // 'options'=>['placeholder'=>'Transaction amount...']
                    'options'=>[
                        'readonly'=>'readonly',
                        ],
                    ],
            ]
        ],
        [
            'attributes'=>[       // 1 column layout
                'notes'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Enter notes...']],
            ],
        ],
        [
            'attributes'=>[
                'record_status'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                    'items'=>[ 'active' => 'Active', 'inactive' => 'Inactive', ], 
                    ], 
                // 'void'=>['type'=>Form::INPUT_CHECKBOX, ], 
                'actions'=>[    // embed raw HTML content
                    'type'=>Form::INPUT_RAW, 
                    'value'=>  '<div style="text-align: right; margin-top: 20px">' . 
                        Html::resetButton('Reset', ['class'=>'btn btn-default']) . ' ' .
                        Html::submitButton('Submit', ['class'=>'btn btn-primary']) . 
                        '</div>'
                ],
             ],
        ],
    ],
]);
ActiveForm::end();
?>

</div>

<?php
$this->registerJs("
    $('#salestransaction-total_amount, #salestransaction-exchange_rate').change(function(){
        var paid_amt = $('#salestransaction-total_amount').val(),
            exchange_rate = $('#salestransaction-exchange_rate').val(),
            trnx_amt = 0;
            paid_amt = paid_amt - 0; // convert to int 
            exchange_rate = exchange_rate - 0; // convert to int 
            trnx_amt = paid_amt * exchange_rate;
        $('#salestransaction-transaction_amount').val(trnx_amt.toFixed(2));
    });
"); 
?>
