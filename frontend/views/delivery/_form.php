<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\FormGrid;
use kartik\builder\Form;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Delivery */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="delivery-form">
<?php

$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL, 'id'=>'delivery-form-create', ]);
echo FormGrid::widget([
    'model'=>$model,
    'form'=>$form,
    'autoGenerateColumns'=>true,
    'rows'=>[
        [
            'attributes'=>[       // 2 column layout
                'vehicle_id'=>[
                        'type'=>Form::INPUT_WIDGET,
                        'widgetClass'=>'\kartik\widgets\Select2',
                        'options'=>['data'=>$model->vehicleList],
                        ],
                'delivery_date'=>['type'=>Form::INPUT_WIDGET,
                        'widgetClass'=>'\kartik\widgets\DatePicker',
                        'options' => ['pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'autoclose'=>true,
                            'todayHighlight' => true]],
                        ],
            ]
        ],
        [
            'attributes'=>[       // 3 column layout
              'registration_number'=>[
                  'type'=>Form::INPUT_TEXT,
                  'options'=>[
                      'placeholder'=>'Enter registration number...',
                      ]
                  ],
                'mileage'=>[
                    'type'=>Form::INPUT_TEXT,
                    'options'=>[
                        'placeholder'=>'Enter delivery mileage...',
                        ]
                    ],
                'delivery_status_id'=>[
                        'type'=>Form::INPUT_WIDGET,
                        'widgetClass'=>'\kartik\widgets\Select2',
                        'options'=>['data'=>$model->deliveryStatusList],
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
