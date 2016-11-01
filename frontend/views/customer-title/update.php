<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerTitle */

$this->title = 'Update Customer Title: ' . ' ' . $model->customer_title_id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->customer_title_id, 'url' => ['view', 'id' => $model->customer_title_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-title-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
