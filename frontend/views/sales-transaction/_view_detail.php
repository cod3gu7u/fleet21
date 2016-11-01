<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'sales_transaction_id',
            // 'sales_id',
            'transaction_date',
            'salesTransactionType.sales_transaction_type',
            'transaction_amount:currency',
            'void:boolean',
            'notes:ntext',
            'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',
        ],
    ]) ?>