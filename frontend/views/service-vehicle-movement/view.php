<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ServiceVehicleMovement */

$this->title = $model->movement_id;
$this->params['breadcrumbs'][] = ['label' => 'Service Vehicle Movements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-vehicle-movement-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->movement_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->movement_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'movement_id',
            'vehicle.reference_number',
            'movementType.movement_type',
            'movement_date',
            'notes:ntext',
            'record_status',
        //     'create_user_id',
        //     'create_date',
        //     'update_user_id',
        //     'update_date',
        ],
    ]) ?>

</div>
