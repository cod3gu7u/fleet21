<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VehiclePhotoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-photo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vehicle_photo_id') ?>

    <?= $form->field($model, 'vehicle_id') ?>

    <?= $form->field($model, 'photograph') ?>

    <?= $form->field($model, 'notes') ?>

    <?= $form->field($model, 'record_status') ?>

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
