<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleCosting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-costing-form">

<?php 
    $form = ActiveForm::begin();
    echo FormGrid::widget([
        'model' => $model,
        'form' => $form,
        'autoGenerateColumns' => true,
        'rows' => [
            [
                'attributes' => [
                    'creditor_id'=>[
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>[ 'data'=>$model->creditorList ],
                        ],
                    'cost_date'=>['type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\DatePicker', 
                        'options' => ['pluginOptions' => [
                            'format' => 'yyyy-mm-dd', 
                            'autoclose'=>true, 
                            'todayHighlight' => true]],
                        ],
                ],
            ],
            [
                'attributes'=>[       // 1 column layout
                    'cost_category_id'=>[
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data'=>$model->costCategoryList],
                        ],
                    'currency_id'=>[
                        'type'=>Form::INPUT_DROPDOWN_LIST, 
                        'items'=>$model->currencyList, 
                        ],
                    ],
            ],
            [
                'attributes'=>[       // 1 column layout
                    'transaction_amount'=>[
                        'type'=>Form::INPUT_TEXT,  
                        'options'=>['placeholder'=>'0.00'],
                        ],
                    'exchange_rate'=>[
                        'type'=>Form::INPUT_TEXT,  
                        'options'=>['placeholder'=>'1.00'],
                        ],
                    'total_amount'=>[
                        'type'=>Form::INPUT_TEXT,  
                        'options'=>['readonly'=>'readonly', 'placeholder'=>'0.00'],
                        ],
                ],
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
        ]
    ]);
    ActiveForm::end();
?>

</div>

<?php

$this->registerJs("
    $('#vehiclecosting-transaction_amount, #vehiclecosting-exchange_rate').change(function(){
        var trnx_amt = $('#vehiclecosting-transaction_amount').val(),
            exchange_rate = $('#vehiclecosting-exchange_rate').val(),
            total_amt = 0;
            trnx_amt = trnx_amt - 0; // convert to int
            exchange_rate = exchange_rate - 0; // convert to int
            total_amt = trnx_amt * exchange_rate;
            $('#vehiclecosting-total_amount').val(total_amt.toFixed(2));
    });
");
?>