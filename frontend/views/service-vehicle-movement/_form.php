<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;


/* @var $this yii\web\View */
/* @var $model app\models\ServiceVehicleMovement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-vehicle-movement-form">
<?php 
    $form = ActiveForm::begin();
    echo FormGrid::widget([
        'model' => $model,
        'form' => $form,
        'autoGenerateColumns' => true,
        'rows' => [
            [
                'attributes' => [
                    'movement_type_id'=>[
                        'type'=>Form::INPUT_DROPDOWN_LIST, 
                        // 'widgetClass'=>'\kartik\widgets\Select2', 
                        'items'=>$model->movementTypeList,
                        'options'=>[
                        'onchange'=>'
                                $.post("/service-vehicle-movement/vehicle-list?id='.'" + $(this).val(), function(data){
                                    $("select#select2-servicevehiclemovement-vehicle_id-container").html(data);
                                });',
                            ],
                        ],
                    'vehicle_id'=>[
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data'=>$model->vehicleList],
                        ],
                    'movement_date'=>['type'=>Form::INPUT_WIDGET, 
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
