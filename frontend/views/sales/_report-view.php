<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sales */

$this->title = $model->sales_id;
// $this->params['breadcrumbs'][] = ['label' => 'Sales', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>

<div class="sales-view">

    <h5 class="text-center">Sales Report No.: <?= Html::encode($this->title) ?></h5>

    <address>
        <strong><?= $model->customer->customer_name; ?></strong><br>
        <?= $model->customer->address; ?><br>
        <?= $model->customer->telephone; ?><br>
        <?= $model->customer->cellphone; ?><br>
    </address>

    <table class="table table-striped table-bordered table-condensed">
        <tr><th colspan="2"><h5>Vehicle Details</h5></th><th colspan="2"><h5>Sales Details</h5></th></tr>
        <tr>
            <td><strong>Reference Number:</strong></td><td><?= $model->vehicle->reference_number; ?></td>
            <td><strong>Sales Amount:</strong></td><td><?= Yii::$app->formatter->asCurrency($model->final_sales_amount); ?></td>
        </tr>
        <tr>
            <td><strong>Chassis:</strong></td><td><?= $model->vehicle->chassis; ?></td>
            <td><strong>Paid Amount:</strong></td><td><?= Yii::$app->formatter->asCurrency($model->paid_amount); ?></td>
        </tr>
        <tr>
            <td><strong>Make:</strong></td><td><?= $model->vehicle->make->make; ?></td>
            <td><strong>Balance:</strong></td><td><?= Yii::$app->formatter->asCurrency($model->balance); ?></td>
        </tr>
        <tr>
            <td><strong>Year:</strong></td><td><?= $model->vehicle->model_year; ?></td>
            <td><strong>Sales Date:</strong></td><td><?= $model->sales_date; ?></td>
        </tr>
            <tr><td><strong>Color:</strong></td><td><?= $model->vehicle->color->color; ?></td>
            <td><strong>Sales Person:</strong></td><td><?= $model->salesPerson->sales_person; ?></td>
        </tr>
        <tr><td colspan="4"><strong>Notes:</strong><br><?= $model->notes; ?></td></tr>
    </table>

</div>


