<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ServiceStatus */

$this->title = 'Update Service Status: ' . ' ' . $model->service_status_id;
$this->params['breadcrumbs'][] = ['label' => 'Service Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->service_status_id, 'url' => ['view', 'id' => $model->service_status_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
