<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UnitOfMeasure */

$this->title = 'Update Unit Of Measure: ' . ' ' . $model->unit_of_measure_id;
$this->params['breadcrumbs'][] = ['label' => 'Unit Of Measures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->unit_of_measure_id, 'url' => ['view', 'id' => $model->unit_of_measure_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unit-of-measure-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
