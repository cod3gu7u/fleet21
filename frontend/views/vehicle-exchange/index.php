<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehicleExchangeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehicle Exchanges';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-exchange-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Vehicle Exchange', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vehicle_exchange_id',
            'original_sales_id',
            'original_vehicle_id',
            'new_vehicle_id',
            'new_sales_amount',
            // 'exchange_date',
            // 'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
