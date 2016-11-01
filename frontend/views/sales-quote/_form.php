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
use app\models\Customer;
use yii\base\Model;

/* @var $this yii\web\View */
/* @var $model app\models\Sales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-form">

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
                'vehicle_id'=>[
                        'type'=>Form::INPUT_WIDGET,
                        'widgetClass'=>'\kartik\widgets\Select2',
                        'options'=>['data'=>\app\models\Sales::getVehicleList()],
                        ],
                'customer_id'=>[
                        'type'=>Form::INPUT_WIDGET,
                        'widgetClass'=>'\kartik\widgets\Select2',
                        'options'=>['data'=>\app\models\Sales::getCustomerList(),
                        'addon' => [
                                'append' => [
                                    'content' => Html::a(
                                        '<i class="glyphicon glyphicon-plus"></i>',
                                        ['/customer/create'],
                                        ['class'=>'btn btn-primary showModalButton']),
                                    'asButton' => true
                                ]
                            ],
                        ],
                    ],
                'sales_person_id'=>[
                        'type'=>Form::INPUT_WIDGET,
                        'widgetClass'=>'\kartik\widgets\Select2',
                        'options'=>['data'=>\app\models\Sales::getSalesPersonList()],
                        ],
            ]
        ],
        [
            'attributes'=>[       // 4 column layout
                'quote_issue_date'=>['type'=>Form::INPUT_WIDGET,
                        'widgetClass'=>'\kartik\widgets\DatePicker',
                        'options' => ['pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'autoclose'=>true,
                            'todayHighlight' => true]],
                        ],
                'quote_expiry_date'=>['type'=>Form::INPUT_WIDGET,
                        'widgetClass'=>'\kartik\widgets\DatePicker',
                        'options' => ['pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'autoclose'=>true,
                            'todayHighlight' => true]],
                        ],
                'quoted_amount'=>[
                    'type'=>Form::INPUT_TEXT,
                    'options'=>[
                        'placeholder'=>'Enter quote amount...',
                        ]
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

Pjax::end();
?>


</div>