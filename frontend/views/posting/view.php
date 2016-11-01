<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Posting */

$this->title = $model->posting_sequence_id;
$this->params['breadcrumbs'][] = ['label' => 'Postings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posting-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->posting_sequence_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->posting_sequence_id], [
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
            'posting_sequence_id',
            'account_id',
            'journal_id',
            'accounting_period_id',
            'asset_type_id',
            'quantity',
            'unit_amount',
            'total_amount',
            'posting_status',
            'journal_owner_id',
            'posting_date',
            'posting_user_id',
        ],
    ]) ?>

</div>
