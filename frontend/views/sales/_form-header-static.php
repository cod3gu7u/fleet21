<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
// use yii\grid\GridView;
use kartik\detail\DetailView;
use yii\helpers\Url;
use kartik\builder\TabularForm;
use app\models\SalesTransaction;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Sales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-form">

<?php

$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL, 'id'=>'sales-form-create', ]);
echo FormGrid::widget([
    'model'=>$model,
    'form'=>$form,
    'autoGenerateColumns'=>true,
    'rows'=>[
        [
            'attributes'=>[       // 2 column layout
                'vehicle_id' => [
                    'type' => Form::INPUT_DROPDOWN_LIST, 
                    'items'=> $model->getReferenceNumber($model->vehicle_id),
                ],
                'customer_id'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                        'items'=>$model->customerList, 
                        ],
                'sales_person_id'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                        'items'=>$model->salesPersonList, 
                        ],
            ]
        ],
        [
            'attributes'=>[       // 4 column layout
                'sales_date'=>['type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\DatePicker', 
                        'options' => ['pluginOptions' => [
                            'format' => 'yyyy-mm-dd', 
                            'autoclose'=>true, 
                            'todayHighlight' => true]],
                        ],
                'original_sales_amount'=>[
                    'type'=>Form::INPUT_TEXT, 
                    ],
                'discount_amount'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'placeholder'=>'Enter discount amount...',
                        ],
                    ],
                'final_sales_amount'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'disabled'=>'disabled',
                        ],
                    ],
            ]
        ],
        [
            'attributes'=>[ 
                'paid_amount'=>[
                    'type'=>Form::INPUT_TEXT, 
                    ],
                'balance'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'placeholder'=>'Enter discount amount...',
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
             ],
        ],
    ],
]);
ActiveForm::end();
?>


<?php

$this->registerJs("
    $('document').ready(function(){     
        // disable all form input fields
        $('#sales-form-create :input').prop('disabled', true);
        $('#w8 :input').prop('disabled', true);

        // format money textboxes
        var og_sls_amt = $('#sales-original_sales_amount').val(),
            sls_dscnt_amt = $('#sales-discount_amount').val(),
            sls_paid_amt = $('#sales-paid_amount').val(),
            sls_bal_amt = $('#sales-balance').val(),
            sls_amt = 0;

            og_sls_amt = og_sls_amt - 0; // convert to int 
            sls_dscnt_amt = sls_dscnt_amt - 0; // convert to int 
            sls_paid_amt = sls_paid_amt - 0; // convert to int 
            sls_bal_amt = sls_bal_amt - 0; // convert to int 
            sls_amt = og_sls_amt - sls_dscnt_amt;

        $('#sales-original_sales_amount').val(og_sls_amt.toFixed(2));
        $('#sales-discount_amount').val(sls_dscnt_amt.toFixed(2));
        $('#sales-paid_amount').val(sls_paid_amt.toFixed(2));
        $('#sales-balance').val(sls_bal_amt.toFixed(2));
        $('#sales-final_sales_amount').val(sls_amt.toFixed(2));
    });        
"); 
?>


