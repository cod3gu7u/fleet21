<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleType */

$this->title = 'Update Vehicle Type: ' . ' ' . $model->vehicle_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vehicle_type_id, 'url' => ['view', 'id' => $model->vehicle_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vehicle-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
