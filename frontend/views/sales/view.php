<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sales */

$this->title = $model->sales_id;
$this->params['breadcrumbs'][] = ['label' => 'Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-print"></i> Report', ['report', 'id' => $model->sales_id], ['class' => 'btn btn-info', 'target'=> '_blank',]) ?> 
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Update', ['update', 'id' => $model->sales_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sales_id',
            'customer.customer_name',
            'vehicle.reference_number',
            'salesPerson.sales_person',
            'sales_date',
            'original_sales_amount',
            'discount_amount',
            'final_sales_amount',
            'paid_amount',
            'balance',
            // 'void:boolean',
            'salesStatus.sales_status',
            'notes:ntext',
            'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',
        ],
    ]) ?>

    <?= Yii::$app->controller->renderPartial('@app/views/sales-transaction/_index',[
                'dataProvider' => new \yii\data\ActiveDataProvider([
                    'query' => $model->getSalesTransactions(),
                    'pagination' => false
                    ]),
            ]);
            ?>

</div>
