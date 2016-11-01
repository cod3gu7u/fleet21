<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VehicleCosting */

$this->title = 'Create Vehicle Costing';
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Costings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-costing-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
