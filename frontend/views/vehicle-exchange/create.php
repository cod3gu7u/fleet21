<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VehicleExchange */

$this->title = 'Create Vehicle Exchange : ' . $reference_number ;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Exchanges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-exchange-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
