<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BankTransferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bank Transfers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-transfer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bank Transfer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'bank_transfer_id',
            [ 
                'attribute' => 'source_bank_id',
                'label' => 'Source Bank', 
                'value' => 'sourceBank.bank', 
            ],
            [ 
                'attribute' => 'destination_bank_id',
                'label' => 'Destination Bank', 
                'value' => 'destinationBank.bank', 
            ],
            'amount',
            'transfer_date',
            // 'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
