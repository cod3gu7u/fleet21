<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PurchaseOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->registerJsFile(
    '@web/frontend/assets/js/script.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
    );

$this->title = 'Purchase Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Purchase Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'purchase_order_id',
            'creditor.creditor',
            'order_date',
            'shipping_date',
            [
                'attribute'=>'total_amount',
                'format'=>'currency',
                'contentOptions' =>['class' => 'text-right'],
            ],
            [
                'attribute'=>'billed_amount',
                'format'=>'currency',
                'contentOptions' =>['class' => 'text-right'],
            ],
            [
                'attribute' => 'orderStatus',
                'value' => 'orderStatus.purchase_order_status',
            ],
            // 'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
