<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\web\Session;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentVoucherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->registerJsFile(
    '@web/frontend/assets/js/script.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
    );

$this->title = 'Payment Vouchers ' . $title;
// $this->subtitle = $subtitle;
// $this->params['breadcrumbs'][] = $this->title;

    $total_final_amount = 0; 
    foreach  ($dataProvider->getModels()  as  $key => $val) { 
            $total_final_amount += $val['final_amount']; 
        } 

?>
<div class="payment-voucher-index">

<h5><strong>Transactions <?=  Html::encode($subtitle) ?> </strong></h5>


<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'footerRowOptions'=>['style'=>'font­weight:bold;text­decoration: underline;', 'class'=>'active'],
        'headerRowOptions'=>['class'=>'info'],
        'showFooter' => true,
        'showOnEmpty'=>false,
        'emptyCell'=>'­-',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'payment_voucher_id',
            // [
            //     'attribute'=>'bank_id',
            //     'value'=>'bank.bank',
            // ],
            'pv_number',
            [
                'label' => 'Creditor',
                'attribute'=>'creditor_id',
                'value'=>'creditor.creditor',
            ],
            'cheque_no',
            // [
            //     'label' => 'Date',
            //     'attribute'=>'pv_date',
            // ],
            // [
            //     'label' => 'Payment Method',
            //     'attribute'=>'payment_method_id',
            //     'value'=>'paymentMethod.payment_method',
            // ],
            // [
            //     'attribute' => 'amount',
            //     'format' => 'currency',
            // ],
            [
                'attribute' => 'tax_rate',
                'format' => 'percent',
            ],
            [
                'attribute' => 'final_amount',
                'format' => 'currency',
                'footer' => '<strong>' . Yii::$app->formatter->asCurrency($total_final_amount) . '</strong>',
            ],
            // 'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',


        ],

        'tableOptions' =>['class' => 'table table­-striped table­-bordered table-condensed'],
        // 'afterRow' => function($model, $key, $index, $grid){
        //     return
        //     '<tr class="info"> <caption>Creditor Details</caption>' .
        //         '<tr><th>Creditor</th><th colspan="4">Notes</th></tr>' . 
        //         '<tr><td>' .  
        //             $model->creditor->creditor . '</td><td colspan="4">' .  
        //             // $model->notes . '</td><td>' .  
        //             $model->notes . '</td>
        //         </tr></tr>';
        // },

    ]); ?>
<?php Pjax::end(); ?></div>
