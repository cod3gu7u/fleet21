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

<div class="purchase-order-item-form">

<?php

$form = ActiveForm::begin(['id'=>'purchase-order-item-form-grid']);
echo FormGrid::widget([
    'model'=>$model,
    'form'=>$form,
    'autoGenerateColumns'=>true,
    'rows'=>[
        [
            'attributes'=>[
                'purchase_order_item'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'placeholder'=>'Enter amount...',
                        ],
                    ],
                'barcode'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'placeholder'=>'Enter barcode...',
                        ],
                    ],

            ]
        ],
        [
            'attributes'=>[       // 4 column layout
                'instock_count'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'placeholder'=>'Enter in-stock count...',
                        ],
                    ],
                'reorder_level'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'placeholder'=>'Enter in-stock count...',
                        ],
                    ],
                'unit_of_measure_id'=>[
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>[
                            'data' => \app\models\UnitOfMeasure::getUnitOfMeasureList(),
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

