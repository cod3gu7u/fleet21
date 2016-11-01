<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CashbookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cashbooks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cashbook-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cashbook_entry_id',
            'bank_id',
            'accounting_period_id',
            'transaction_date',
            'transaction_type_id',
            // 'account_id',
            // 'payer_payee_id',
            // 'reference_number',
            // 'notes:ntext',
            // 'exclusive_amount',
            // 'tax_id',
            // 'tax_rate',
            // 'tax_amount',
            // 'total_amount',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>