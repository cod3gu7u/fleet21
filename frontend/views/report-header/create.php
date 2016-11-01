<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReportHeader */

$this->title = 'Create Report Header';
$this->params['breadcrumbs'][] = ['label' => 'Report Headers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-header-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
