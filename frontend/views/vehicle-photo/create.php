<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VehiclePhoto */

$this->title = 'Create Vehicle Photo';
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-photo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
