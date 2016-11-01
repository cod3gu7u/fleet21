<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ServiceVehicleMovement */

$this->title = 'Create Service Vehicle Movement';
$this->params['breadcrumbs'][] = ['label' => 'Service Vehicle Movements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-vehicle-movement-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
