<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;

/* @var $this yii\web\View */
/* @var $model app\models\SalesTransactionType */
/* @var $form yii\widgets\ActiveForm */

$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]);

echo FormGrid::widget([
    'model'=>$model,
    'form'=>$form,
    'autoGenerateColumns'=>true,
    'rows'=>[
        [
            'attributes'=>[       // 2 column layout
                'sales_transaction_type'=>[
                    'type'=>Form::INPUT_TEXT, 
                    'options'=>['placeholder'=>'Enter transaction type...']
                    ],
            ]
        ],
        [
            'attributes'=>[       // 2 column layout
                'debit_account_id'=>[
                    'type'=>Form::INPUT_DROPDOWN_LIST, 
                    'items'=>$model->accountList, 
                    // 'hint'=>'select customer title',
                    ],
                'credit_account_id'=>[
                    'type'=>Form::INPUT_DROPDOWN_LIST, 
                    'items'=>$model->accountList, 
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

