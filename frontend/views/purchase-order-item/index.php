<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PurchaseOrderItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventory Product Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-order-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inventory Product Item', ['create'], ['class' => 'btn btn-success', 'target'=>'_self']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'purchase_order_item_id',
            'purchase_order_item',
            'barcode',
            'stock_counter',
            'instock_count',
            'reorder_level',
            'unitOfMeasure.unit_of_measure',
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
