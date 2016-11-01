<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;


/* @var $this yii\web\View */
/* @var $model app\models\Service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-static-header">

<?php 
    $form = ActiveForm::begin(['id'=>'service-static-form']);
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
                    'service'=>[
                        'type'=>Form::INPUT_TEXT,  
                        'options'=>['placeholder'=>'Enter service...'],
                        ],
                    'service_date'=>['type'=>Form::INPUT_WIDGET, 
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
                    'service_status_id'=>[
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data'=>$model->serviceStatusList],
                        ],
                    'units'=>[
                        'type'=>Form::INPUT_TEXT,  
                        'options'=>['placeholder'=>'0'],
                        ],
                    'total_cost'=>[
                        'type'=>Form::INPUT_TEXT,  
                        'options'=>['placeholder'=>'0.00'],
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
    // disable all form input fields
    $('#service-static-form :input').prop('disabled', true);
    $('#w7-container :input').prop('disabled', true);        
"); 
?>