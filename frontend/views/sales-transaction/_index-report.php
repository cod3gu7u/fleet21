<?php

use yii\helpers\Html;
use yii\grid\GridView;
// use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SalesTransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $sales_id */

$this->title = $title;
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-transaction-index">

    <h4><?= Html::encode($this->title) ?></h4>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'rowOptions' => function($model){
            if($model->void == true){
                return ['class'=>'danger'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'sales_transaction_id',
            // 'sales_id',
            [
              'label'=>'Reference Number',
              'attribute'=>'sales_id',
              'value'=>'sales.vehicle.reference_number',
            ],
            'transaction_date',
            [
              'attribute'=>'payment_method_id',
              'value'=>'paymentMethod.payment_method',
            ],
            [
              'attribute'=>'sales_transaction_type_id',
              'value'=>'salesTransactionType.sales_transaction_type',
            ],
            [
                'attribute'=>'transaction_amount',
                'format'=>['currency', 'P  '],
            ],
            'void:boolean',
            // 'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

        ],
    ]); ?>

</div>
