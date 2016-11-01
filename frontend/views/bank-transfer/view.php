<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BankTransfer */

$this->title = $model->bank_transfer_id;
$this->params['breadcrumbs'][] = ['label' => 'Bank Transfers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-transfer-view">

    <?php if(\Yii::$app->user->can('admin')) : ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->bank_transfer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->bank_transfer_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <? endif ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'bank_transfer_id',
            'sourceBank.bank',
            'destinationBank.bank',
            'amount',
            'transfer_date',
            'notes:ntext',
            'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',
        ],
    ]) ?>

</div>
