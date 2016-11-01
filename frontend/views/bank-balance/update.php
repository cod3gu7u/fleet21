<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BankBalance */

$this->title = 'Update Bank Balance: ' . ' ' . $model->bank_balance_id;
$this->params['breadcrumbs'][] = ['label' => 'Bank Balances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bank_balance_id, 'url' => ['view', 'id' => $model->bank_balance_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bank-balance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
