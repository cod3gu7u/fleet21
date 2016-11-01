<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PurchaseOrderLineItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Purchase Order Line Items';
// $this->params['breadcrumbs'][] = $this->title;

    $tax_amount = 0; 
    $total_amount = 0; 
    $billed_amount = 0; 
    foreach  ($dataProvider->getModels() as $key => $val) { 
            $tax_amount += $val['tax_amount']; 
            $total_amount += $val['total_amount']; 
            $billed_amount += $val['billed_amount']; 
        } 


?>
<div class="purchase-order-line-item-index">

    <h4><?= Html::encode($this->title) ?></h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Purchase Order Line Item', ['purchase-order-line-item/create', 'id'=>$purchase_order_id], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'footerRowOptions'=>['class' => 'text-right', 'style'=>'font­-weight:bold; text­-decoration:underline;'],
        'showFooter' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'purchase_order_line_item_id',
            // 'purchase_order_id',
            'purchaseOrderItem.purchase_order_item',
            'unit_cost',
            'units',
            'received_units',
            // 'tax_rate',
            [
                'attribute'=>'tax_amount',
                'format'=>'currency',
                'contentOptions' =>['class' => 'text-right'],
                'footer'=> '<strong>' . Yii::$app->formatter->asCurrency($tax_amount) . '</strong>',
            ],
            [
                'attribute'=>'total_amount',
                'format'=>'currency',
                'contentOptions' =>['class' => 'text-right'],
                'footer'=> '<strong>' . Yii::$app->formatter->asCurrency($total_amount) . '</strong>',
            ],
            [
                'attribute'=>'billed_amount',
                'format'=>'currency',
                'contentOptions' =>['class' => 'text-right'],
                'footer'=> '<strong>' . Yii::$app->formatter->asCurrency($billed_amount) . '</strong>',
            ],
            // 'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{receive} {view} {update} {delete}',
                'buttons' => [
                    'receive' => function ($url, $model) {
                        if($model->units > $model->received_units && \Yii::$app->user->can('admin')){
                                return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, [
                                    'title' => Yii::t('app', 'Receive Purchase Order Item'),
                                    'class' => 'showModalButton', 
                               ]);
                        }
                    },
                    // 'receive' => function ($url, $model) {
                    //     return Html::a('<span class="glyphicon glyphicon-print"></span>', $url, [
                    //         'title' => Yii::t('app', 'Report'),
                    //         // 'class' => 'btn btn-info', 
                    //         'target'=> '_blank',
                    //     ]);
                    // }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'receive') {
                        $url ='/purchase-order-receive-item/create?id=' . $key ; 
                        return $url;
                    }
                    if ($action === 'view') {
                        $url ='/purchase-order-line-item/view?id=' . $key ; 
                        return $url;
                    }                    
                    if ($action === 'update') {
                        $url ='/purchase-order-line-item/update?id=' . $key ; 
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='/purchase-order-line-item/delete?id=' . $key ; 
                        return $url;
                    }
                    if ($action === 'print') {
                        $url ='/purchase-order-line-item/report?id=' . $key ; 
                        return $url;
                    }
                }
            ],
        ],
        // 'afterRow' => function($model, $key, $index, $grid){
        //             return
        //             Yii::$app->controller->renderPartial('@app/views/purchase-order-receive-item/_sub-index',[
        //                 'purchase_order_line_item_id' => $model->purchase_order_line_item_id,
        //                 'dataProvider' => new \yii\data\ActiveDataProvider([
        //                     'query' => $model->getPurchaseOrderReceiveItems(),
        //                     'pagination' => false
        //                     ]),
        //             ]);
        //         },

    ]); ?>
<?php Pjax::end(); ?></div>
