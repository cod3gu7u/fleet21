<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\StockIssuanceDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stock Issuance Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-issuance-detail-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Stock Issuance Detail', ['stock-issuance-detail/create', 'id'=>$stock_issuance_id], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'stock_issuance_detail_id',
            // 'stock_issuance_id',
            // 'vehicle_id',
            'vehicle.reference_number',
            'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
