<?php

use yii\helpers\Html;

?>


<h4><strong><?=  Html::encode($model->reference_number) ?> </strong></h4>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Reference #</th>
      <td><?= $model->reference_number; ?></td>
      <th>Make</th>
      <td><?= $model->make->make; ?></td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Type</th>
      <td><?= $model->vehicleType->vehicle_type; ?></td>
      <td>Model</td>
      <td><?= $model->model_id; ?></td>
    </tr>
    <tr>
      <th scope="row">Chassis</th>
      <td><?= $model->chassis; ?></td>
      <td>Color</td>
      <td><?= $model->color->color; ?></td>
    </tr>
  </tbody>
</table>

<barcode code="<?= $model->reference_number ?>" type="ean13" height="0.66" text="1" />