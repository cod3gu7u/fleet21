<?php

use yii\helpers\Html;
use yii\grid\GridView;
// use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SalesTransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $sales_id */

// $this->title = 'Sales Transactions';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-transaction-index">

    <!-- <h3><?= Html::encode($this->title) ?></h3> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(
                        '<i class="glyphicon glyphicon-plus"></i> Add New', 
                        ['sales-transaction/create', 'relation_id' => $sales_id], 
                        ['class'=>'showModalButton btn btn-success', ]
                    )
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
            if($model->void == true){
                return ['class'=>'danger'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'sales_transaction_id',
            // 'sales_id',
            'transaction_date',
            [
              'attribute'=>'sales_transaction_type_id',
              'value'=>'salesTransactionType.sales_transaction_type',
            ],
            [
                'attribute'=>'transaction_amount',
                'format'=>['currency', 'P  '],
            ],
            // 'void:boolean',
            // 'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {void} {print}',
                'buttons' => [
                    'void' => function ($url, $model) {
                        if($model->void == false && \Yii::$app->user->can('admin')){
                                return Html::a('<span class="glyphicon glyphicon-remove-circle"></span>', $url, [
                                    'title' => Yii::t('app', 'Void'),
                                    // 'class' => 'btn btn-danger', 
                               ]);
                        }
                    },
                    'print' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-print"></span>', $url, [
                            'title' => Yii::t('app', 'Report'),
                            // 'class' => 'btn btn-info', 
                            'target'=> '_blank',
                        ]);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'void') {
                        $url ='/sales-transaction/void?id=' . $key ; // your own url generation logic
                        return $url;
                    }
                    if ($action === 'view') {
                        $url ='/sales-transaction/view?id=' . $key ; // your own url generation logic
                        return $url;
                    }
                    if ($action === 'print') {
                        $url ='/sales-transaction/report?id=' . $key ; // your own url generation logic
                        return $url;
                    }
                }
            ]
        ],
    ]); ?>

</div>
