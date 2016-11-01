<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SalesTransactionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-transaction-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sales_transaction_id') ?>

    <?= $form->field($model, 'sales_id') ?>

    <?= $form->field($model, 'transaction_date') ?>

    <?= $form->field($model, 'sales_transaction_type_id') ?>

    <?= $form->field($model, 'transaction_amount') ?>

    <?php // echo $form->field($model, 'void')->checkbox() ?>

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
