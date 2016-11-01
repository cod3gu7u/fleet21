<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SalesTransactionType */

$this->title = 'Create Sales Transaction Type';
$this->params['breadcrumbs'][] = ['label' => 'Sales Transaction Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-transaction-type-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
