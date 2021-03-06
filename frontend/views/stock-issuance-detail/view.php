<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StockIssuanceDetail */

$this->title = $model->stock_issuance_detail_id;
$this->params['breadcrumbs'][] = ['label' => 'Stock Issuance Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-issuance-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->stock_issuance_detail_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->stock_issuance_detail_id], [
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
            'stock_issuance_detail_id',
            'stock_issuance_id',
            'vehicle_id',
            'notes:ntext',
            'record_status',
            'create_user_id',
            'create_date',
            'update_user_id',
            'update_date',
        ],
    ]) ?>

</div>
