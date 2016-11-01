<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReportDefinition */

$this->title = 'Update Report Definition: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Report Definitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="report-definition-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
