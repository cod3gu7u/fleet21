<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehicleCostingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-costing-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            [
                'attribute' => 'currency_id',
                'value' => 'currency.currency_short',
                // 'title' => 'Currency',
            ],
            // 'transaction_amount',
            // 'exchange_rate',
            [
                'attribute' => 'total_amount',
                'format'=>['decimal',2],
            ], 
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
