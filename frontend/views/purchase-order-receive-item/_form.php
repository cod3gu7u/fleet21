<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrderReceiveItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchase-order-receive-item-form">

 	<h4><?= $model->purchaseOrderLineItem->purchaseOrderItem->purchase_order_item; ?></h4>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'received_units')->textInput() ?>

    <?= $form->field($model, 'received_date')->widget(DatePicker::classname(),[
			'name' => 'received_date', 
			// 'value' => $model->received_date,
			'options' => ['placeholder' => 'Select received date ...'],
			'pluginOptions' => [
				// 'format' => 'dd-M-yyyy',
				'format' => 'Y-m-d',
				'todayHighlight' => true
			]
		]); ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
