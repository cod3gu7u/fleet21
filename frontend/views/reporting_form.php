<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reporting */
/* @var $form ActiveForm */
?>
<div class="reporting_form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'start_date') ?>
        <?= $form->field($model, 'end_date') ?>
        <?= $form->field($model, 'param') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- reporting_form -->
