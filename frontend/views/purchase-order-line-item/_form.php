<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use yii\helpers\Url;
// use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrderLineItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchase-order-line-item">

<?php

$form = ActiveForm::begin(['id'=>'purchase-order-line-item-grid']);
echo FormGrid::widget([
    'model'=>$model,
    'form'=>$form,
    'autoGenerateColumns'=>true,
    'rows'=>[
        [
            'attributes'=>[       // 2 column layout
                'purchase_order_item_id'=>[         
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data' => \app\models\PurchaseOrderItem::getPurchaseOrderItemList(),
                            'addon' => [
                                    'append' => [
                                        'content' => Html::a(
                                            '<i class="glyphicon glyphicon-plus showModalButton"></i>',
                                            ['/purchase-order-item/create'],
                                            ['class'=>'btn btn-primary showModalButton']),
                                        'asButton' => true
                                    ]
                                ],  
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ],
                    ],
                'unit_cost'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'placeholder'=>'Enter unit cost...',
                        ],
                    ],                
                'units'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'placeholder'=>'Enter unit cost...',
                        ],
                    ],
            ]
        ],
        [
            'attributes'=>[       // 4 column layout
                'tax_rate'=>[
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data' => \app\models\Tax::getTaxList(),], 
                        ],
                'tax_amount'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'placeholder'=>'0.00',
                        'readonly'=>'readonly',
                        ],
                    ],
                'total_amount'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'placeholder'=>'Enter amount...',
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

</div>

<?php

$this->registerJs("
    $('#purchaseorderlineitem-unit_cost, #purchaseorderlineitem-units, #purchaseorderlineitem-tax_rate').change(function(){
        
        var unit_cost = $('#purchaseorderlineitem-unit_cost').val(),
            units = $('#purchaseorderlineitem-units').val(),
            tax_rate = $('#select2-purchaseorderlineitem-tax_rate-container').text(),
            total_unit_cost = 0,
            tax_amount = 0,
            total_amount = 0;

            unit_cost = unit_cost - 0; // convert to int
            units = units - 0; // convert to int
            tax_rate = tax_rate - 0; // convert to int

            tax_amount = (unit_cost * units) * (tax_rate);
            total_amount = (unit_cost * units) * (1 + tax_rate);

            $('#purchaseorderlineitem-tax_amount').val(tax_amount.toFixed(2));
            $('#purchaseorderlineitem-total_amount').val(total_amount.toFixed(2));
    });

");
?>