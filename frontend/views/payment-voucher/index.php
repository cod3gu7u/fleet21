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

$this->title = 'Payment Vouchers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-voucher-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php 
        $session = new Session;
            foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
                echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
            }
    ?>

    <p>
        <?= Html::a('Create Payment Voucher', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'payment_voucher_id',
            [
                'attribute'=>'bank_id',
                'value'=>'bank.bank',
            ],
            'pv_number',
            [
                'attribute'=>'creditor_id',
                'value'=>'creditor.creditor',
            ],
            'pv_date',
            [
                'attribute'=>'payment_method_id',
                'value'=>'paymentMethod.payment_method',
            ],
            'amount',
            'tax_rate',
            'final_amount',
            // 'cheque_no',
            // 'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {post} {update} {print}',
                'buttons' => [
                    'post' => function ($url, $model) {
                        if($model->posting_status == 'open' && \Yii::$app->user->can('admin')){
                                return Html::a('<span class="glyphicon glyphicon-ok-circle"></span>', $url, [
                                    'title' => Yii::t('app', 'Post'),
                               ]);
                        }
                    },
                    // 'cbpost' => function ($url, $model) {
                    //             return Html::a('<span class="glyphicon glyphicon-ok-circle"></span>', $url, [
                    //                 'title' => Yii::t('app', 'Post'),
                    //            ]);
                    // },
                    'print' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-print"></span>', $url, [
                            'title' => Yii::t('app', 'Report'),
                            // 'class' => 'showModalButton', 
                            'target'=> '_blank',
                        ]);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'post') {
                        $url ='/payment-voucher/gl-post?id=' . $key;
                        return $url;
                    }
                    // if ($action === 'cbpost') {
                    //     $url ='/payment-voucher/cb-post?id=' . $key;
                    //     return $url;
                    // }
                    if ($action === 'view') {
                        $url ='/payment-voucher/view?id=' . $key;
                        return $url;
                    }
                    if ($action === 'update') {
                        $url ='/payment-voucher/update?id=' . $key;
                        return $url;
                    }
                    if ($action === 'print') {
                        $url ='/payment-voucher/report?id=' . $key;
                        return $url;
                    }
                }
            ],
        ],
        'tableOptions' =>['class' => 'table table­-striped table­-bordered table-condensed'],
        
    ]); ?>
<?php Pjax::end(); ?></div>
