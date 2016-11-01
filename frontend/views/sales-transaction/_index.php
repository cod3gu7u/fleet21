<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalesTransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var title */
/* @var subtitle */

    $total_amount = 0; 
    foreach  ($dataProvider->getModels() as $key => $val) { 
            $total_amount += $val['sales_transaction_type_id'] === 1 ? $val['total_amount'] : $val['total_amount'] * -1; 
        } 

?>
<div class="sales-transaction-index">

    <h4><strong><?= $title ?> </strong></h4>
    <h5><strong>Sales Transactions <?= $subtitle ?> </strong></h5>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        // 'rowOptions' => function($model){
        //     if($model->void == true){
        //         return ['class'=>'danger'];
        //     }
        // },
       'rowOptions'=> function  ($model, $key, $index, $grid){
            $class = $index % 2 ? '' : 'info';
             return  array ('key'=>$key,'index'=>$index,'class'=>$class);
        },
        'footerRowOptions'=>['style'=>'font­weight:bold;text­decoration: underline;'],
        'showFooter' => true,
        'showOnEmpty'=>false,
        'emptyCell'=>'­-',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'sales_transaction_id',
            [
                // 'attribute' => 'sales_id',
                'label' => 'Customer',
                'value' => 'sales.customer.customer_name',
            ],            
            [
                // 'attribute' => 'sales_id',
                'label' => 'Reference #',
                'value' => function($model)
                {
                    return $model->sales->vehicle->reference_number;
                },
                // 'sales.customer.customer_name',
            ],
            // 'transaction_date',
            // [
            //     'attribute' => 'sales_id',
            //     'value' => 'sales.vehicle.reference_number',
            // ],
            [
              'attribute'=>'sales_transaction_type_id',
              'value'=>'salesTransactionType.sales_transaction_type',
            ],
            // [
            //     'label' => 'Chassis',
            //     'value' => 'sales.vehicle.chassis',
            // ],
            // [
            //     'label' => 'Make',
            //     'value' => 'sales.vehicle.make.make',
            // ],
            // [
            //     'attribute' => 'currency_id',
            //     'value' => 'currency.currency_short',
            // ],
            
            [
                'attribute'=>'total_amount',
                // 'value' => function($model)
                //     {
                //         return $model->sales_transaction_type_id === 1 ? $model->total_amount : $model->total_amount * -1;
                //     },
                'format'=>['decimal',2],
                 'footer'=> '<strong>' . Yii::$app->formatter->asDecimal($total_amount,2) . '</strong>',
            ],
            // [
            //     'attribute'=>'transaction_amount',
            //     'format'=>['currency', 'P  '],
            //     'footer'=> '<strong>' . Yii::$app->formatter->asCurrency($transaction_amount) . '</strong>',
            // ],
            // 'void:boolean',
            // 'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',
        ],
        'tableOptions' =>['class' => 'table table­-striped table­-bordered table-condensed'],
        // 'afterRow' => function($model, $key, $index, $grid){
                   
        //             return
        //             '<tr class="info"> <caption>Vehicle Details</caption>' .
        //                 '<tr><th>Ref. No</th><th>Chassis</th><th>Make</th><th>Model</th></tr>' . 
        //                 '<tr><td>' .  
        //                     $model->sales->vehicle->reference_number . '</td><td>' .  
        //                     $model->sales->vehicle->chassis . '</td><td>' .  
        //                     $model->sales->vehicle->vehicleMake->make . '</td><td>' .  
        //                     $model->sales->vehicle->model->model . '</td>
        //                 </tr></tr>';
        //         },
    ]); ?>

</div>
