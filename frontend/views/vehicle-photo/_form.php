<?php

use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VehiclePhoto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-photo-form">
<?php
    $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); //important
    echo $form->field($model, 'file')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]);

    echo $form->field($model, 'notes')->textarea(['rows' => 6]);

    echo $form->field($model, 'record_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], 
        ['prompt' => '']);

    echo Html::submitButton('Submit', ['class'=>'btn btn-primary']);


    ActiveForm::end();
?>

</div>
