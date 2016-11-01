<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BankTransfer */

$this->title = 'Create Bank Transfer';
$this->params['breadcrumbs'][] = ['label' => 'Bank Transfers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-transfer-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
