<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Delivery */

$this->title = $model->delivery_id;
$this->params['breadcrumbs'][] = ['label' => 'Deliveries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-view">

    <h4 class="text-center">Delivery Note For Sold Vehicle.: <?= Html::encode($model->vehicle->reference_number) ?></h4>

    <address>
        <strong><?= $model->sales->customer->customer_name; ?></strong><br>
        <?= $model->sales->customer->address; ?><br>
        <?= $model->sales->customer->telephone; ?><br>
        <?= $model->sales->customer->cellphone; ?><br>
    </address>

    <hr>

    <table class="table table-striped table-bordered table-condensed">
        <tr>
          <td><strong>Reference Number : </strong></td><td><?= $model->vehicle->reference_number; ?></td>
          <td><strong>Registration Number :</strong></td><td><?= $model->registration_number; ?></td>
        </tr>
        <tr>
          <td><strong>Model :</strong></td><td><?= $model->vehicle->model->model; ?></td>
          <td><strong>Chassis :</strong></td><td><?= $model->vehicle->chassis; ?></td>
        </tr>
        <tr>
          <td><strong>Color :</strong></td><td><?= $model->vehicle->color->color; ?></td>
          <td><strong>Make :</strong></td><td><?= $model->vehicle->make->make; ?></td>
        </tr>
        <tr>
          <td><strong>Mileage :</strong></td><td><?= $model->mileage; ?></td>
          <td><strong>Engine :</strong></td><td><?= $model->vehicle->engine; ?></td>
        </tr>
        <tr>
          <td><strong>Delivery Date :</strong></td><td><?= $model->delivery_date; ?></td>
          <td><strong>Delivery Status :</strong></td><td><?= $model->deliveryStatus->delivery_status; ?></td>
        </tr>
        <tr>
          <td colspan="4">
            <strong>Remarks :</strong><br><?= $model->notes; ?>
          </td>
        </tr>
    </table>

    <hr>
    <p>
      <small>
      <ol>
        <li>One (1) month warranty ONLY for the ENGINE and GEARBOX.</li>
        <li>No warranty for tyres.</li>
        <li>
          It is the customer's responsibility to return the vehicle to the garage if the customer encounters
          problems related to the above whilst still under warranty.
        </li>
        <li>NO CLAIMS WILL BE ENTERTAINED AFTERWARDS BY BOTH PARTIES.</li>
      </ol>
      </small>
    </p>

</div>
