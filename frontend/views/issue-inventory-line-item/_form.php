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

<div class="issue-inventory-line-item-form">

<?php

$form = ActiveForm::begin(['id'=>'purchase-order-item-form-grid']);
echo FormGrid::widget([
    'model'=>$model,
    'form'=>$form,
    'autoGenerateColumns'=>true,
    'rows'=>[
        [
            'attributes'=>[
                'barcode'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'placeholder'=>'Enter barcode...',
                        ],
                    ],
                'quantity'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        ],
                    ],
            ],
        ],
        [
            'attributes'=>[
                'purchase_order_item_id'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'placeholder'=>'Product ID...',
                        'readonly'=>'readonly',
                        ],
                    ],
                'product_name'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'readonly'=>'readonly',
                        ],
                    ],
            ],
        ],
        [
            'attributes'=>[       // 1 column layout
                'notes'=>['type'=>Form::INPUT_TEXTAREA, 
                'options'=>[
                    'readonly'=>'readonly',
                    'placeholder'=>'Enter notes...']
                    ],
            ],
        ],
        [
            'attributes'=>[
                'record_status'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                    'items'=>[ 'active' => 'Active', 'inactive' => 'Inactive', ], 
                    'options'=>[
                        'readonly'=>'readonly',
                        ],
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
