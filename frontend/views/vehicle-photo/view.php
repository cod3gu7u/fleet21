<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VehiclePhoto */

$this->title = $model->vehicle_photo_id;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-photo-view">

<?php
    $url = " http://fleet21.dev//frontend/web/uploads/vehicles/" . $model->photograph;
    Html::img($url,['alt'=>'<i class="fa fa-cab"></i>vehicle-photo', 'width'=>'480']);
    echo '<img src="' .  $url . '" class="img-responsive img-thumbnail img-rounded" alt="Responsive image width="160px" ">';
?>
</div>
