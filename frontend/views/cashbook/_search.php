<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CashbookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cashbook-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cashbook_entry_id') ?>

    <?= $form->field($model, 'bank_id') ?>

    <?= $form->field($model, 'accounting_period_id') ?>

    <?= $form->field($model, 'transaction_date') ?>

    <?= $form->field($model, 'transaction_type_id') ?>

    <?php // echo $form->field($model, 'account_id') ?>

    <?php // echo $form->field($model, 'reference_number') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'exclusive_amount') ?>

    <?php // echo $form->field($model, 'tax_id') ?>

    <?php // echo $form->field($model, 'tax_amount') ?>

    <?php // echo $form->field($model, 'total_amount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
