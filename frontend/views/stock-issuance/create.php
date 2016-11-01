<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StockIssuance */

$this->title = 'Create Stock Issuance';
$this->params['breadcrumbs'][] = ['label' => 'Stock Issuances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-issuance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
