<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ServiceItem */

$this->title = 'Update Service Item: ' . ' ' . $model->service_item_id;
$this->params['breadcrumbs'][] = ['label' => 'Service Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->service_item_id, 'url' => ['view', 'id' => $model->service_item_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
