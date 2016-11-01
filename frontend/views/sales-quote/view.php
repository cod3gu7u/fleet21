<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SalesQuote */

$this->title = $model->sales_quote_id;
$this->params['breadcrumbs'][] = ['label' => 'Sales Quotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-quote-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Report', ['report', 'id' => $model->sales_quote_id], ['class' => 'btn btn-info', 'target' => '_blank']) ?>        
        <?= Html::a('Update', ['update', 'id' => $model->sales_quote_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->sales_quote_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sales_quote_id',
            'vehicle.reference_number',
            'customer.customer_name',
            'salesPerson.sales_person',
            'quote_issue_date',
            'quote_expiry_date',
            'quoted_amount',
            'notes:ntext',
            'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',
        ],
    ]) ?>

</div>
