<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BankbookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bankbooks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bankbook-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bankbook', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bankbook_entry_id',
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
<?php Pjax::end(); ?></div>
