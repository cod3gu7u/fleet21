<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalesTransactionTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales Transaction Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-transaction-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sales Transaction Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'sales_transaction_type_id',
            'sales_transaction_type',
            [
             'attribute' => 'debit_account_id',
             'label'=>'Debit Account',
             'value' => 'debitAccount.account_name'
            ],
            [
             'attribute' => 'credit_account_id',
             'label'=>'Credit Account',
             'value' => 'creditAccount.account_name'
            ],
            'notes:ntext',
            // 'record_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
