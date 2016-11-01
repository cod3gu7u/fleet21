<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SalesTransaction */

$this->title = $model->sales_transaction_id;
$this->params['breadcrumbs'][] = ['label' => 'Sales Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-transaction-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

</div>
