<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DeliveryStatus */

$this->title = 'Update Delivery Status: ' . ' ' . $model->delivery_status_id;
$this->params['breadcrumbs'][] = ['label' => 'Delivery Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->delivery_status_id, 'url' => ['view', 'id' => $model->delivery_status_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="delivery-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
