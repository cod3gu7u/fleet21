<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Postings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posting-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Posting', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'posting_sequence_id',
            'account.account_name',
            'journal_id',
            'accountingPeriod.accounting_period',
            'assetType.asset_type',
            // 'quantity',
            'unit_amount',
            'total_amount',
            // 'posting_status',
            // 'journal_owner_id',
            // 'posting_date',
            // 'posting_user_id',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
