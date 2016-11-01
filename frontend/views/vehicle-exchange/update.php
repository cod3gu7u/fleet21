<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleExchange */

$this->title = 'Update Vehicle Exchange: ' . ' ' . $model->vehicle_exchange_id;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Exchanges', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vehicle_exchange_id, 'url' => ['view', 'id' => $model->vehicle_exchange_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vehicle-exchange-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
