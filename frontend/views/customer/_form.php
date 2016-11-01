<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;

$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL, 'id'=>$model->formName()]);

echo FormGrid::widget([
    'model'=>$model,
    'form'=>$form,
    'autoGenerateColumns'=>true,
    'rows'=>[
        [
            'attributes'=>[       // 2 column layout
                'customer_name'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>['placeholder'=>'Enter username...']
                    ],
                'vat_registration_number'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>['placeholder'=>'Enter vat registration number...'],
                    ],
            ]
        ],
        [
            'attributes'=>[       // 2 column layout
                'customer_title_id'=>[
                    'type'=>Form::INPUT_DROPDOWN_LIST, 
                    'items'=>$model->customerTitleList, 
                    // 'hint'=>'select customer title',
                    ],
                'customer_type_id'=>[
                    'type'=>Form::INPUT_DROPDOWN_LIST, 
                    'items'=>$model->customerTypeList, 
                    ],
            ]
        ],
        [
            'attributes'=>[       // 3 column layout
                'telephone'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>['placeholder'=>'Enter telephone...']
                    ],
                'cellphone'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>['placeholder'=>'Enter cellphone...']
                    ],
                'address'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>['placeholder'=>'Enter address...']
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
    $('form#{$model->formName()}').on('beforeSubmit', function(e)
    {
        var \$form = $(this);
        $.ajax({
          type: 'post',
          url: \$form.attr('action'),
          data: \$form.serialize(),
          success: function(data)
          { 
                if(data.message){
                    alert('Error: ' + data.message);
                }
                else{
                    var select = $('#sales-customer_id');
                    var option = $('<option></option>').
                         attr('selected', true).
                         text(data.customer_name).
                         val(data.customer_id);
                    /* insert the option (which is already 'selected'!) into the select */
                    option.appendTo(select);
                    /* Let select2 do whatever it likes with this */
                    select.trigger('change');

                    $('#modal').modal('hide');
                }
            }
          // dataType: dataType
        });

        return false;
    });
"); 
?>