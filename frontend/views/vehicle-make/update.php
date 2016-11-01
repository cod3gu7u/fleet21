<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleMake */

$this->title = 'Update Vehicle Make: ' . ' ' . $model->vehicle_make_id;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Makes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vehicle_make_id, 'url' => ['view', 'id' => $model->vehicle_make_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vehicle-make-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
