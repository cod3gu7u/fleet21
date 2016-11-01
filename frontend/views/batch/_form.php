<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Batch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="batch-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'batch_name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'batch_date')->widget(DatePicker::classname(), [
		// 'name' => 'check_issue_date', 
		'value' => date('d-M-Y', strtotime('+2 days')),
		'options' => ['placeholder' => 'Select issue date ...'],
		'pluginOptions' => [
			'format' => 'dd-M-yyyy',
			'todayHighlight' => true
		]
	]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
