<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReportDefinition */

$this->title = 'Create Report Definition';
$this->params['breadcrumbs'][] = ['label' => 'Report Definitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-definition-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
