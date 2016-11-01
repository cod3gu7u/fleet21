<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccountingPeriod */

$this->title = 'Update Accounting Period: ' . ' ' . $model->accounting_period_id;
$this->params['breadcrumbs'][] = ['label' => 'Accounting Periods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->accounting_period_id, 'url' => ['view', 'id' => $model->accounting_period_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="accounting-period-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
