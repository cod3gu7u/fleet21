<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehicleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $title */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'vehicle_id',
            'reference_number',
            'location.location',
            'vehicleMake.make',
            'vehicleType.type',
            'vehicleModel.model',
            'model_year',
            'chassis',
            'engine',
            'color.color',
            'capacity',
            'arrival_date',
            'arrival_mileage',
            'stockStatus.stock_status',
            'asking_price',
            // 'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
