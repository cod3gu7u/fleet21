<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SalesTransactionType */

$this->title = 'Update Sales Transaction Type: ' . ' ' . $model->sales_transaction_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Sales Transaction Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sales_transaction_type_id, 'url' => ['view', 'id' => $model->sales_transaction_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sales-transaction-type-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
