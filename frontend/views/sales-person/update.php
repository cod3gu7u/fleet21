<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SalesPerson */

$this->title = 'Update Sales Person: ' . ' ' . $model->sales_person_id;
$this->params['breadcrumbs'][] = ['label' => 'Sales People', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sales_person_id, 'url' => ['view', 'id' => $model->sales_person_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sales-person-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
