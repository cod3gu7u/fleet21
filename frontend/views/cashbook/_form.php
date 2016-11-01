<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Cashbook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cashbook-form">

<?php

$form = ActiveForm::begin(['id'=>'cashbook-form-grid']);
echo FormGrid::widget([
    'model'=>$model,
    'form'=>$form,
    'autoGenerateColumns'=>true,
    'rows'=>[
        [
            'attributes'=>[       // 2 column layout
                'bank_id'=>[         
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data'=>$model->bankList,
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ],  
                    ],
                'accounting_period_id'=>[
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data'=>$model->accountingPeriodList],
                        ],
                'transaction_type_id'=>[
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data'=>$model->transactionTypeList], 
                        ],
                'account_id'=>[
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data'=>$model->accountList], 
                        ],
            ]
        ],
        [
        'attributes'=>[       // 4 column layout
                'payer_payee_id'=>[         
                        'type'=>Form::INPUT_WIDGET, 
                        // 'type' => \kartik\widgets\DepDrop::TYPE_SELECT2,
                        // 'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
                        'widgetClass'=>\kartik\widgets\DepDrop::classname(), 
                        'options'=>[
                            'pluginOptions'=>[
                                 'depends'=>['cashbook-transaction_type_id'],
                                 'placeholder' => 'Select...',
                                 'url' => Url::to(['/cashbook/payer-payee'])
                             ],
                            ],  
                        ],
                'transaction_date'=>['type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\DatePicker', 
                        'options' => ['pluginOptions' => [
                            'format' => 'yyyy-mm-dd', 
                            'autoclose'=>true, 
                            'todayHighlight' => true]],
                        ],
                'reference_number'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'placeholder'=>'Reference note...',
                        ]
                    ],
            ]
        ],
        [
            'attributes'=>[       // 4 column layout
                'exclusive_amount'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'placeholder'=>'Enter amount...',
                        ],
                    ],
                'tax_amount'=>[
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data'=>$model->taxList], 
                        ],
                'total_amount'=>[
                    'type'=>Form::INPUT_TEXT, 
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

<?php

$this->registerJs("
    $('#cashbook-exclusive_amount, #cashbook-tax_amount').change(function(){
        
        var exclusive_amount = $('#cashbook-exclusive_amount').val(),
            tax_amount = $('#select2-cashbook-tax_amount-container').text(),
            total_amount = 0;

            exclusive_amount = exclusive_amount - 0; // convert to int
            tax_amount = tax_amount - 0; // convert to int

            total_amount = exclusive_amount * (1 + tax_amount);

            $('#cashbook-total_amount').val(total_amount.toFixed(2));
    });
");
?>