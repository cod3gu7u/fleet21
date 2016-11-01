<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BankBalance */

$this->title = $model->bank_balance_id;
$this->params['breadcrumbs'][] = ['label' => 'Bank Balances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-balance-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->bank_balance_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->bank_balance_id], [
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
            // 'bank_balance_id',
            'bank.bank',
            'start_date',
            'end_date',
            'opening_balance',
            'closing_balance',
            'notes:ntext',
            // 'creator_id',
            // 'create_date',
            // 'updater_id',
            // 'update_date',
        ],
    ]) ?>

</div>
