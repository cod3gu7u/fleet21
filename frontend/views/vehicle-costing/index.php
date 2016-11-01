<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehicleCostingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehicle Costings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-costing-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Vehicle Costing', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'vehicle_costing_id',
            'creditor.creditor',
            'vehicle.reference_number',
            'costCategory.cost_category',
            'cost_date',
            // 'currency_id',
            // 'transaction_amount',
            // 'exchange_rate',
            'total_amount',
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
