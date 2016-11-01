<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BankTransfer */

$this->title = 'Update Bank Transfer: ' . ' ' . $model->bank_transfer_id;
$this->params['breadcrumbs'][] = ['label' => 'Bank Transfers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bank_transfer_id, 'url' => ['view', 'id' => $model->bank_transfer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bank-transfer-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
