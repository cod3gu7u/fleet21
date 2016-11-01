<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StockIssuance */

$this->title = $model->stock_issuance_id;
$this->params['breadcrumbs'][] = ['label' => 'Stock Issuances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-issuance-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->stock_issuance_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->stock_issuance_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'stock_issuance_id',
            'purchaseOrderItem.purchase_order_item',
            'units',
            'issuance_date',
            'notes:ntext',
            'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',
        ],
    ]) ?>

</div>
