<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ServiceMovementType */

$this->title = 'Update Service Movement Type: ' . ' ' . $model->movement_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Service Movement Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->movement_type_id, 'url' => ['view', 'id' => $model->movement_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-movement-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
