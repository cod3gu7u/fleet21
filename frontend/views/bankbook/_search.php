<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BankbookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bankbook-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bankbook_entry_id') ?>

    <?= $form->field($model, 'bank_id') ?>

    <?= $form->field($model, 'accounting_period_id') ?>

    <?= $form->field($model, 'transaction_date') ?>

    <?= $form->field($model, 'transaction_type_id') ?>

    <?php // echo $form->field($model, 'account_id') ?>

    <?php // echo $form->field($model, 'payer_payee_id') ?>

    <?php // echo $form->field($model, 'reference_number') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'exclusive_amount') ?>

    <?php // echo $form->field($model, 'tax_id') ?>

    <?php // echo $form->field($model, 'tax_rate') ?>

    <?php // echo $form->field($model, 'tax_amount') ?>

    <?php // echo $form->field($model, 'total_amount') ?>

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
