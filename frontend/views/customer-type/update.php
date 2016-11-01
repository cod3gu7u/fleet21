<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerType */

$this->title = 'Update Customer Type: ' . ' ' . $model->customer_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->customer_type_id, 'url' => ['view', 'id' => $model->customer_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
