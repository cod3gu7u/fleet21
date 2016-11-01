<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use yii\widgets\Pjax;
use app\models\Sales;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleExchange */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-exchange-form">


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
                  'original_vehicle_id'=>[
                    'type'=>Form::INPUT_TEXT,
                    'value'=>$model->originalVehicle->reference_number,
                    'options'=>[
                      'placeholder'=>$model->originalVehicle->reference_number,
                      'readonly'=>'readonly',
                      'visible'=>false,
                    ]
                  ],
                  'new_vehicle_id'=>[
                          'type'=>Form::INPUT_WIDGET,
                          'widgetClass'=>'\kartik\widgets\Select2',
                          'options'=>['data'=> Sales::getVehicleList()],
                          ],
              ]
          ],
          [
              'attributes'=>[       // 4 column layout
                  'exchange_date'=>['type'=>Form::INPUT_WIDGET,
                          'widgetClass'=>'\kartik\widgets\DatePicker',
                          'options' => ['pluginOptions' => [
                              'format' => 'yyyy-mm-dd',
                              'autoclose'=>true,
                              'todayHighlight' => true]],
                          ],
                  'new_sales_amount'=>[
                          'type'=>Form::INPUT_TEXT,
                          'options'=>[
                              'placeholder'=>'Enter new sales amount...',
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
