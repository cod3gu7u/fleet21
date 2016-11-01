<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\AccountingPeriod */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accounting-period-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal' ]); ?>

    <?= $form->field($model, 'accounting_period')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'start_date')->widget(DatePicker::classname(), [
		'name' => 'start_date', 
		'value' => date('d-M-Y', strtotime('+2 days')),
		'options' => ['placeholder' => 'Select issue date ...'],
		'pluginOptions' => [
			'format' => 'dd-M-yyyy',
			'todayHighlight' => true
		]
	]);?>

	<?= $form->field($model, 'end_date')->widget(DatePicker::classname(), [
		'name' => 'end_date', 
		'value' => date('d-M-Y', strtotime('+2 days')),
		'options' => ['placeholder' => 'Select issue date ...'],
		'pluginOptions' => [
			'format' => 'dd-M-yyyy',
			'todayHighlight' => true
		]
	]);?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'record_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?> 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
