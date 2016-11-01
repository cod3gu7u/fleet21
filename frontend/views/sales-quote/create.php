<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SalesQuote */

$this->title = 'Create Sales Quote';
$this->params['breadcrumbs'][] = ['label' => 'Sales Quotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-quote-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
