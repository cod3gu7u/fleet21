<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bankbook */

$this->title = $model->bankbook_entry_id;
$this->params['breadcrumbs'][] = ['label' => 'Bankbooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bankbook-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->bankbook_entry_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->bankbook_entry_id], [
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
            'bankbook_entry_id',
            'bank_id',
            'accounting_period_id',
            'transaction_date',
            'transaction_type_id',
            'account_id',
            'payer_payee_id',
            'reference_number',
            'notes:ntext',
            'exclusive_amount',
            'tax_id',
            'tax_rate',
            'tax_amount',
            'total_amount',
            'record_status',
            'create_user_id',
            'create_date',
            'update_user_id',
            'update_date',
        ],
    ]) ?>

</div>
