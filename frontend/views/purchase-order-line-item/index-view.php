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
    foreach  ($dataProvider->getModels()  as  $key => $val) { 
            $tax_amount += $val['tax_amount']; 
            $total_amount += $val['total_amount']; 
            $billed_amount += $val['billed_amount']; 
        } 


?>
<div class="purchase-order-line-item-index">

    <h4><?= Html::encode($this->title) ?></h4>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter'=>true,
        'footerRowOptions'=>['class' => 'text-right', 'style'=>'font­-weight:bold; text­-decoration:underline;'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'purchase_order_line_item_id',
            // 'purchase_order_id',
            'purchaseOrderItem.purchase_order_item',
            [
               'attribute'=>'unit_cost',
               'format'=> 'currency',
               'contentOptions' =>['class' => 'text-right'],
            ],
            'units',
            'received_units',
            // 'tax_rate',
            [
                'attribute'=>'tax_amount',
                'format'=>'currency',
                'contentOptions' =>['class' => 'text-right'],
                'footer'=> '<strong>' . Yii::$app->formatter->asCurrency($tax_amount) . '</strong>',
                'footerOptions' => ['class' => 'text-right', 'style'=>'font­-weight:bold;'],
            ],
            [
               'attribute'=>'total_amount',
               'format'=>'currency',
                'contentOptions' =>['class' => 'text-right'],
                'footer'=> '<strong>' . Yii::$app->formatter->asCurrency($total_amount) . '</strong>',
                'footerOptions' => ['class' => 'text-right', 'style'=>'font­-weight:bold;'],

            ],
            [
               'attribute'=>'billed_amount',
               'format'=>'currency',
                'contentOptions' =>['class' => 'text-right'],
                'footer'=> '<strong>' . Yii::$app->formatter->asCurrency($billed_amount) . '</strong>',
                'footerOptions' => ['class' => 'text-right', 'style'=>'font­-weight:bold;'],

            ],
            // [
            //    'attribute'=>'total_amount',
            //    'format'=>'currency',
            //     'contentOptions' =>['class' => 'text-right'],
            //     'footer'=> '<strong>' . Yii::$app->formatter->asDecimal($total_amount,2) . '</strong>',
            // ],
            // 'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

            // ['class' => 'yii\grid\ActionColumn'],

        ],
        'tableOptions' =>['class' => 'table table­-striped table­-bordered table-condensed'],
    ]); ?>
<?php Pjax::end(); ?></div>
