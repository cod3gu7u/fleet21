<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VehiclePhoto */

$this->title = 'Update Vehicle Photo: ' . ' ' . $model->vehicle_photo_id;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vehicle_photo_id, 'url' => ['view', 'id' => $model->vehicle_photo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vehicle-photo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
