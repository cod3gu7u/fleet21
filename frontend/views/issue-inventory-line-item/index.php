<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IssueInventoryLineItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Issue Inventory Line Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issue-inventory-line-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Issue Inventory Line Item'), ['issue-inventory-line-item/create', 'id'=>$issue_inventory_id], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'issue_inventory_line_item_id',
            // 'issue_inventory_id',
            [
               'attribute' => 'purchase_order_item_id',
               'value' => 'purchaseOrderItem.purchase_order_item',
            ],
            'quantity',
            'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
