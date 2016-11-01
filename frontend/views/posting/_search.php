<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PostingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posting-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'posting_sequence_id') ?>

    <?= $form->field($model, 'account_id') ?>

    <?= $form->field($model, 'journal_id') ?>

    <?= $form->field($model, 'accounting_period_id') ?>

    <?= $form->field($model, 'asset_type_id') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'unit_amount') ?>

    <?php // echo $form->field($model, 'total_amount') ?>

    <?php // echo $form->field($model, 'posting_status') ?>

    <?php // echo $form->field($model, 'journal_owner_id') ?>

    <?php // echo $form->field($model, 'posting_date') ?>

    <?php // echo $form->field($model, 'posting_user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
