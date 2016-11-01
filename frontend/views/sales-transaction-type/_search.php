<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SalesTransactionTypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-transaction-type-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sales_transaction_type_id') ?>

    <?= $form->field($model, 'sales_transaction_type') ?>

    <?= $form->field($model, 'debit_account_id') ?>

    <?= $form->field($model, 'credit_account_id') ?>

    <?= $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'record_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
