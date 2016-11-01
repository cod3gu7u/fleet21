<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;

/* @var $this yii\web\View */
/* @var $model app\models\Creditor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="creditor-form">
<?php 
    $form = ActiveForm::begin();
    echo FormGrid::widget([
        'model' => $model,
        'form' => $form,
        'autoGenerateColumns' => true,
        'rows' => [
            [
                'attributes' => [
                    'creditor'=>[
                        'type'=>Form::INPUT_TEXT, 
                        'options'=>['placeholder'=>'Enter creditor name...'],
                        ],
                    'creditor_type_id'=>[
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data'=>$model->creditorTypeList],
                        ],
                ],
            ],
            [
                'attributes' => [
                    'address'=>[
                        'type'=>Form::INPUT_TEXT, 
                        'options'=>['placeholder'=>'Enter address...'],
                        ],
                    'telephone'=>[
                        'type'=>Form::INPUT_TEXT, 
                        'options'=>['placeholder'=>'Enter telephone number...'],
                        ],
                    'email'=>[
                        'type'=>Form::INPUT_TEXT, 
                        'options'=>['placeholder'=>'Enter email address...'],
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
                    var select = $('#purchaseorder-creditor_id');
                    var option = $('<option></option>').
                         attr('selected', true).
                         text(data.creditor).
                         val(data.creditor_id);
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