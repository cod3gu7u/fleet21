<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use yii\helpers\Url;
// use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $model app\models\PaymentVoucher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-voucher-form">

<?php

$form = ActiveForm::begin(['id'=>'payment-voucher-form-grid']);
echo FormGrid::widget([
    'model'=>$model,
    'form'=>$form,
    'autoGenerateColumns'=>true,
    'rows'=>[
        [
            'attributes'=>[       // 2 column layout
                'creditor_id'=>[         
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data' => \app\models\Creditor::getCreditorList(),
                            'addon' => [
                                    'append' => [
                                        'content' => Html::a(
                                            '<i class="glyphicon glyphicon-plus"></i>',
                                            ['/creditor/create1'],
                                            ['class'=>'btn btn-primary showModalButton']),
                                        'asButton' => true
                                    ]
                                ],  
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ],
                    ],
                'pv_date'=>['type'=>Form::INPUT_WIDGET, 
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
                'bank_id'=>[         
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data' => \app\models\Bank::getBankList(),
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ],  
                    ],
                'payment_method_id'=>[         
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data' => \app\models\PaymentMethod::getPaymentMethodList(),
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ],  
                    ],
                'cheque_no'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'readonly'=>'readonly',
                        'placeholder'=>'Enter cheque number...',
                        ],
                    ],
            ]
        ],
        [
            'attributes'=>[       // 4 column layout
                // 'amount'=>[    // embed raw HTML content
                //     'type'=>Form::INPUT_RAW, 
                //     'value'=> 
                //     '<label class="control-label" for="paymentvoucher-amount">Amount</label>' .
                //     '<div class="input-group">
                //           <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
                //           <div class="input-group-addon">' .
                //           Html::a(
                //                 '<i class="glyphicon glyphicon-plus"></i>',
                //                 ['/purchase-order/getPurchaseOrder', ],
                //                 ['class'=>'btn btn-primary btn-sm showModalButton']) .
                //           '</div>
                //     </div>'
                // ],
                'amount'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'placeholder'=>'Enter amount...',
                        // 'pluginOptions' => [
                        // 'addon' => [
                        //         'append' => [
                        //             'content' => Html::a(
                        //                 '<i class="glyphicon glyphicon-plus"></i>',
                        //                 ['/creditor/create1'],
                        //                 ['class'=>'btn btn-primary showModalButton']),
                        //             'asButton' => true
                        //         ]
                        //     ],
                        //     ],
                        ],
                    ],
                'discount'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'placeholder'=>'Enter discount...',
                        ],
                    ],
                'tax_rate'=>[
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data' => \app\models\Tax::getTaxList(),], 
                        ],
                'final_amount'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'placeholder'=>'Enter amount...',
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

</div>

<?php

$this->registerJs("
    $('#paymentvoucher-amount, #paymentvoucher-discount, #paymentvoucher-tax_rate').change(function(){
        
        var amount = $('#paymentvoucher-amount').val(),
            discount = $('#paymentvoucher-discount').val(),
            tax_rate = $('#select2-paymentvoucher-tax_rate-container').text(),
            total_amount = 0;

            amount = amount - 0; // convert to int
            discount = discount - 0; // convert to int
            tax_rate = tax_rate - 0; // convert to int

            total_amount = (amount - discount) * (1 + tax_rate);

            $('#paymentvoucher-final_amount').val(total_amount.toFixed(2));
    });

    $('#paymentvoucher-payment_method_id').change(function(){
        var pymnt_id = $('#paymentvoucher-payment_method_id option:selected').val();
        var payment_method = (pymnt_id != 3 ? true : false);
        $('#paymentvoucher-cheque_no').attr('readonly', payment_method);
    });
");
?>