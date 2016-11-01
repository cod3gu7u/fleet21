<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleExchangeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-exchange-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vehicle_exchange_id') ?>

    <?= $form->field($model, 'original_sales_id') ?>

    <?= $form->field($model, 'original_vehicle_id') ?>

    <?= $form->field($model, 'new_vehicle_id') ?>

    <?= $form->field($model, 'new_sales_amount') ?>

    <?php // echo $form->field($model, 'exchange_date') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'record_status') ?>

    <?php // echo $form->field($model, 'create_user_id') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'update_user_id') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
