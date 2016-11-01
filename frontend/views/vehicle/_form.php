<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
// use kartik\date\DatePicker;
// use kartik\select2\Select2;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Vehicle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-form">

<?php
    $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]);

    echo FormGrid::widget([
        'model'=>$model,
        'form'=>$form,
        'autoGenerateColumns'=>true,
        'rows'=>[
            [
                // 'contentBefore'=>'<legend class="text-info"><small>Account Info</small></legend>',
                'attributes'=>[       
                    'location_id'=>[         
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data'=>$model->locationList],  
                        ],
                    'supplier_id'=>[         
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data'=>$model->supplierList],  
                        ],
                    'reference_number'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                        'items'=>$model->referenceList, 
                        // 'hint'=>'Type and select vehicle reference'
                        ],
                ]
            ],
            [
                'attributes'=>[       // 3 column layout
                    'make_id'=>[         
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data'=>$model->vehicleMakeList],  
                        ],
                    'vehicle_type_id'=>[         
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data'=>$model->vehicleTypeList],  
                        ],
                    'model_id'=>[         
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>\kartik\widgets\DepDrop::classname(), 
                        'options'=>[
                            'pluginOptions'=>[
                                 'depends'=>['vehicle-make_id'],
                                 'placeholder' => 'Select...',
                                 'url' => Url::to(['/vehicle/vehicle-models'])
                             ],
                            ],  
                        ],
                 ],
            ],
            [
                'attributes'=>[       // 2 column layout
                   'model_year'=>['type'=>Form::INPUT_TEXT, 
                        'options'=>['placeholder'=>'Enter year...']],
                    'chassis'=>['type'=>Form::INPUT_TEXT, 
                        'options'=>['placeholder'=>'Enter chassis...']],
                    'engine'=>['type'=>Form::INPUT_TEXT, 
                        'options'=>['placeholder'=>'Enter engine...']],
                 ],
            ],
            [
                'attributes'=>[       // 2 column layout
                    'fuel_type_id'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                        'items'=>$model->fuelTypeList, 
                        ],
                    'transmission_id'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                        'items'=>$model->transmissionList, 
                        ],
                    'color_id'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                        'items'=>$model->colorList, 
                        // 'hint'=>'Type and select vehicle color'
                        ],
                    'capacity'=>['type'=>Form::INPUT_TEXT, 
                        'options'=>['placeholder'=>'Enter capacity...']],
                 ],
            ],
            [
                'attributes'=>[       // 2 column layout
                    'arrival_date'=>['type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\DatePicker', 
                        'options' => ['pluginOptions' => ['format' => 'yyyy-mm-dd', 'autoclose'=>true, 'todayHighlight' => true]],
                        ],
                    'arrival_mileage'=>['type'=>Form::INPUT_TEXT, 
                        'options'=>['placeholder'=>'Enter capacity...']],
                    'stock_status_id'=>['type'=>Form::INPUT_DROPDOWN_LIST, 
                        'items'=>$model->stockStatusList, 
                        ],
                    'asking_price'=>['type'=>Form::INPUT_TEXT, 
                        'options'=>['placeholder'=>'Enter asking price...']],
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
