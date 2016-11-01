<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $title */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'sales_id',
            'customer.customer_name',
            'vehicle.reference_number',
            // 'salesPerson.sales_person',
            'sales_date',
            // 'original_sales_amount',
            // 'discount_amount',
            // 'final_sales_amount',
            [
                'attribute' => 'original_sales_amount',
                // 'pageSummary' => true,
                // 'hAlign'=>'right',
                // 'vAlign'=>'middle',
                'format'=>['decimal',2],
            ],             
            [
                'attribute' => 'paid_amount',
                // 'pageSummary' => true,
                // 'hAlign'=>'right',
                // 'vAlign'=>'middle',
                'format'=>['decimal',2],
            ], 
            [
                'attribute' => 'balance',
                // 'pageSummary' => true,
                // 'hAlign'=>'right',
                // 'vAlign'=>'middle',
                'format'=>['decimal',2],
            ], 
            // 'void:boolean',
            // 'sales_status_id',
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