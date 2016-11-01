<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ServiceType */

$this->title = 'Update Service Type: ' . ' ' . $model->service_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Service Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->service_type_id, 'url' => ['view', 'id' => $model->service_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
