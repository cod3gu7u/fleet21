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
                        'options'=>['data'=>$model->vehicleList],
                        ],
                'customer_id'=>[
                        'type'=>Form::INPUT_WIDGET,
                        'widgetClass'=>'\kartik\widgets\Select2',
                        'options'=>['data'=>$model->customerList,
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
                // 'customer_id'=>[
                //         'type'=>Form::INPUT_WIDGET,
                //         'widgetClass'=>'\kartik\editable\Editable',
                //         'options'=>[
                //             // 'data'=>$model->customerList,
                //             'model'=>$model,
                //             'attribute'=>'customer_id',
                //             'asPopover' => true,
                //             'size'=>'md',
                //             'displayValue' => 'King Zuru travels first class',
                            // 'afterInput'=>function($form, $widget) {
                            //         return Yii::$app->controller->renderPartial('@app/views/customer/_form',
                            //             ['model'=> Customer::findAll(), 'formName'=>'customer']);
                            //         echo $form->field($widget->model, 'to_date')
                            //             ->widget(\kartik\widgets\DatePicker::classname(), [
                            //             'options'=>['placeholder'=>'To date']
                            //         ])->label(false);
                            //         return Yii::$app->controller->renderPartial('@app/views/customer/create',
                            //             ['model'=>'/models/customer'],
                            //             [
                            //             'model' => $searchModel,
                            //             'searchModel' => $searchModel,
                            //             'dataProvider' => $dataProvider,
                            //         ]
                            //         );
                            //     },
                        //     ],
                        // ],
                // 'balance'=>[ 
                //     'type'=>Form::INPUT_HIDDEN,
                //     'options'=>['hidden'=>true]
                //   ],
                'sales_person_id'=>[
                        'type'=>Form::INPUT_WIDGET,
                        'widgetClass'=>'\kartik\widgets\Select2',
                        'options'=>['data'=>$model->salesPersonList],
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
                    'options'=>[
                        'placeholder'=>'Enter original sales amount...',
                        // 'value'=>'0.00',
                        // 'id'=>'original_sales_amount',
                        ]
                    ],
                'discount_amount'=>[
                    'type'=>Form::INPUT_TEXT,
                    'options'=>[
                        'placeholder'=>'Enter discount amount...',
                        // 'value'=>'0.00',
                        ],
                    ],
                'final_sales_amount'=>[
                    'type'=>Form::INPUT_TEXT,
                    'options'=>[
                        'readonly'=>'readonly',
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


<?php

$this->registerJs("
    $('#sales-original_sales_amount, #sales-discount_amount').change(function(){
        var og_sls_amt = $('#sales-original_sales_amount').val(),
            sls_dscnt_amt = $('#sales-discount_amount').val(),
            sls_amt = 0;
            og_sls_amt = og_sls_amt - 0; // convert to int
            sls_dscnt_amt = sls_dscnt_amt - 0; // convert to int
            sls_amt = og_sls_amt - sls_dscnt_amt;
            // $('#sales-balance').val(sls_amt.toFixed(2));
            $('#sales-final_sales_amount').val(sls_amt.toFixed(2));
    });
");
?>
