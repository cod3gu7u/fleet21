<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\FormGrid;
use kartik\builder\Form;
// use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\IssueInventory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="issue-inventory">
<?php

$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL, 'id'=>'issue-inventory-form', ]);
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
                        'options'=>['data'=> \app\models\Vehicle::getActiveVehicleList()],
                        ],
                'issue_date'=>['type'=>Form::INPUT_WIDGET,
                        'widgetClass'=>'\kartik\widgets\DatePicker',
                        'options' => ['pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'autoclose'=>true,
                            'todayHighlight' => true],
                            'readonly'=>'readonly',
                            ],
                        ],
            ]
        ],
        [
            'attributes'=>[
                'vehicle_details'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>[
                        'readonly'=>'readonly',
                    ],
                ],
            ],
        ],
        // [
        //     'attributes'=>[       // 1 column layout
        //         'notes'=>['type'=>Form::INPUT_HIDDEN, ],
        //     ],
        // ],
        [
            'attributes'=>[
                'record_status'=>['type'=>Form::INPUT_HIDDEN,
                    'label'=>false,
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
