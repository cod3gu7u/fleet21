<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SalesQuote */

$this->title = 'Update Sales Quote: ' . ' ' . $model->sales_quote_id;
$this->params['breadcrumbs'][] = ['label' => 'Sales Quotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sales_quote_id, 'url' => ['view', 'id' => $model->sales_quote_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sales-quote-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
