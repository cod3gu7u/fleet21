<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SalesStatus */

$this->title = 'Update Sales Status: ' . ' ' . $model->sales_status_id;
$this->params['breadcrumbs'][] = ['label' => 'Sales Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sales_status_id, 'url' => ['view', 'id' => $model->sales_status_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sales-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
