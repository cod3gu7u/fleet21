<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SalesTransaction */

$this->title = $model->sales_transaction_id;
?>
<div class="sales-transaction-view">

    <h5 class="text-center"><strong>Sales Transaction No.: <?= Html::encode($this->title) ?></strong></h5>

    <address>
        <strong><?= $model->sales->customer->customer_name; ?></strong><br>
        <?= $model->sales->customer->address; ?><br>
        <?= $model->sales->customer->telephone; ?><br>
        <?= $model->sales->customer->cellphone; ?><br>
    </address>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'sales_transaction_id',
            'sales_id',
            'transaction_date',
            'salesTransactionType.sales_transaction_type',
            [
                'attribute'=>'transaction_amount',
                'format'=>['currency', 'P  '],
            ],
            'void:boolean',
            'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',
        ],
    ]) ?>

    <h5 class="text-center"><strong>THANK YOU!!</strong></h5>

</div>
