<?php

use yii\helpers\Html;
use kartik\builder\Form;
use kartik\widgets\ActiveForm;
use kartik\builder\FormGrid;
use yii\widgets\Pjax;
// use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReportDefinition */
/* @var $form yii\widgets\ActiveForm */

// $parent_account_list = \app\models\AccountType::getAccountTypeList(); 
$account_type_list = \app\models\AccountType::getAccountTypeList(); 
// print_r($model->reportHeader->name); die();
?>

<div class="report-definition-form">
<?php
  
Pjax::begin();

$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL, 'id'=>$model->formName(), ]);
echo FormGrid::widget([
    'model'=>$model,
    'form'=>$form,
    'autoGenerateColumns'=>true,
    'rows'=>[
        [
            'attributes'=>[       // 2 column layout
                'report_header_id'=>[
                        'type'=>Form::INPUT_TEXT,
                        'options'=>[
                            'placeholder'=>$model->reportHeader->name,
                            ],
                        ],
                'name'=>[
                    'type'=>Form::INPUT_TEXT,
                    'options'=>[
                        'placeholder'=>'Enter original sales amount...',
                        ]
                    ],
                'account_type_id'=>[
                        'type'=>Form::INPUT_WIDGET,
                        'widgetClass'=>'\kartik\widgets\Select2',
                        'options'=>['data'=>$account_type_list,
                        ],
                    ],
                'parent_id'=>[
                        'type'=>Form::INPUT_WIDGET,
                        'widgetClass'=>'\kartik\widgets\Select2',
                        'options'=>['data'=>$model->parentList],
                        ],
            ]
        ],
        [
            'attributes'=>[ 
                'side'=>[
                    'type'=>Form::INPUT_WIDGET,
                    'widgetClass'=>'\kartik\widgets\Select2',
                    'options'=>['data'=>[ 'left' => 'Left', 'right' => 'Right', 'middle' => 'Middle', ]],
                    ],      
                'order_id'=>[
                    'type'=>Form::INPUT_TEXT,
                    'options'=>[
                        'placeholder'=>'Enter order id...',
                        ],
                    ],
            ]
        ],
        // [
        //     'attributes'=>[       // 1 column layout
        //         'notes'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Enter notes...']],
        //     ],
        // ],
        [
            'attributes'=>[
                // 'record_status'=>['type'=>Form::INPUT_DROPDOWN_LIST,
                //     'items'=>[ 'active' => 'Active', 'inactive' => 'Inactive', ],
                //     ],
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

Pjax::end();

?>
