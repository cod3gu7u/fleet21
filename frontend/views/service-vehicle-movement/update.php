<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ServiceVehicleMovement */

$this->title = 'Update Service Vehicle Movement: ' . ' ' . $model->movement_id;
$this->params['breadcrumbs'][] = ['label' => 'Service Vehicle Movements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->movement_id, 'url' => ['view', 'id' => $model->movement_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-vehicle-movement-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
